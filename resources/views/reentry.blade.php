<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reentrancy Attack - Smart Contract Security</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000000;
            color: #d4d4d8; /* Zinc-300 */
        }
        /* Custom scrollbar for code blocks */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #18181b; 
        }
        ::-webkit-scrollbar-thumb {
            background: #3f3f46; 
            border-radius: 4px;
        }
        .code-keyword { color: #c084fc; } /* Purple */
        .code-func { color: #60a5fa; } /* Blue */
        .code-string { color: #a7f3d0; } /* Green */
        .code-var { color: #fca5a5; } /* Red/Pink */
        .code-val { color: #fbbf24; } /* Amber */
        .code-comment { color: #71717a; font-style: italic; } /* Gray */
    </style>
</head>
<body class="antialiased min-h-screen pb-20">

    <div class="max-w-4xl mx-auto px-6 py-12">
        
         <a href="{{ route('cybersecurity') }}" class="inline-flex items-center text-gray-400 hover:text-white transition-colors mb-8 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back
        </a>

        <div class="flex items-center gap-4 mb-4">
            <span class="bg-purple-900/40 text-purple-300 border border-purple-700/50 px-3 py-1 rounded-full text-xs font-medium">Smart Contract Security</span>
            <div class="flex items-center text-gray-400 text-xs font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                December 7, 2025
            </div>
            <div class="flex items-center text-gray-400 text-xs font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                14 min read
            </div>
        </div>

        <h1 class="text-purple-400 font-medium text-lg mb-2">Reentrancy Attack</h1>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-100 mb-10 leading-tight">Recursive Withdrawals & Fund Draining</h2>

        <div class="bg-gray-900/30 border-l-4 border-purple-600 p-6 rounded-r-lg mb-12">
            <div class="flex items-start gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <p class="text-gray-300 leading-relaxed">
                    A Reentrancy Attack occurs when a smart contract makes an external call to an untrusted contract, and that untrusted contract calls back ("re-enters") into the original function before the first execution has completed. This allows attackers to manipulate state variables—typically account balances—repeatedly before the contract updates them, often draining the contract's entire liquidity.
                </p>
            </div>
        </div>

        <div class="space-y-10 text-gray-300">
            
            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">How Reentrancy Works</h3>
                <p class="mb-4 leading-relaxed">
                    Smart contracts in Ethereum (and EVM chains) are synchronous. However, when a contract sends Ether to an address, it can trigger code execution at that address (via a `fallback` or `receive` function). If the receiving address is a malicious contract, it can use this opportunity to call the sending function again.
                </p>
                <p class="mb-4 leading-relaxed">
                    The vulnerability arises when the vulnerable contract performs checks (e.g., "does user have balance?"), sends funds, and <em>then</em> updates the balance. The attacker re-enters during the "send funds" step. Since the balance hasn't been updated to zero yet, the check passes again, sending more funds. This loop continues until gas runs out or the vault is empty.
                </p>
                <p class="leading-relaxed">
                    This exploits the atomic nature of transactions and the lack of proper state synchronization during external calls.
                </p>
            </section>

            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">Types of Reentrancy</h3>
                <p class="mb-4 leading-relaxed">
                    <strong>Single Function Reentrancy:</strong> The attacker calls back into the exact same function they are currently executing (e.g., calling `withdraw()` inside a `withdraw()` execution).
                </p>
                <p class="mb-4 leading-relaxed">
                    <strong>Cross-Function Reentrancy:</strong> The attacker re-enters a <em>different</em> function that shares state with the first. For example, entering `withdraw()` but calling back into `transfer()` to move funds that are currently being withdrawn.
                </p>
                <p class="leading-relaxed">
                    <strong>Read-Only Reentrancy:</strong> A newer vector typically affecting DeFi oracles. The attacker doesn't drain the contract directly but manipulates the view of the contract's state (like token price) during the reentrancy window, which other protocols rely on.
                </p>
            </section>

            <section>
                

[Image of reentrancy attack diagram smart contract]

                <div class="flex items-center gap-2 mb-6 text-purple-400 font-medium mt-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                    Code Examples
                </div>

                <div class="bg-[#111115] rounded-lg overflow-hidden border border-gray-800 mb-8">
                    <div class="bg-indigo-900/20 px-4 py-2 border-b border-gray-800 flex items-center justify-between">
                        <span class="text-indigo-400 text-sm font-medium">Vulnerable Code Example (Solidity)</span>
                    </div>
                    <div class="p-4 overflow-x-auto">
<pre class="font-mono text-sm leading-6">
<span class="code-keyword">pragma solidity</span> ^0.8.0;

<span class="code-keyword">contract</span> VulnerableVault {
    <span class="code-keyword">mapping</span>(<span class="code-keyword">address</span> => <span class="code-keyword">uint</span>) <span class="code-keyword">public</span> <span class="code-var">balances</span>;

    <span class="code-keyword">function</span> <span class="code-func">withdraw</span>() <span class="code-keyword">public</span> {
        <span class="code-keyword">uint</span> <span class="code-var">bal</span> = <span class="code-var">balances</span>[<span class="code-keyword">msg.sender</span>];
        <span class="code-func">require</span>(<span class="code-var">bal</span> > <span class="code-val">0</span>);

        <span class="code-comment">// VULNERABLE: Sending Ether before updating state</span>
        <span class="code-comment">// Control flow is handed to the caller here</span>
        (<span class="code-keyword">bool</span> <span class="code-var">sent</span>, ) = <span class="code-keyword">msg.sender</span>.<span class="code-func">call</span>{<span class="code-var">value</span>: <span class="code-var">bal</span>}(<span class="code-string">""</span>);
        <span class="code-func">require</span>(<span class="code-var">sent</span>, <span class="code-string">"Failed to send Ether"</span>);

        <span class="code-comment">// This update happens too late!</span>
        <span class="code-var">balances</span>[<span class="code-keyword">msg.sender</span>] = <span class="code-val">0</span>;
    }
}
</pre>
                    </div>
                </div>

                <div class="bg-[#111115] rounded-lg overflow-hidden border border-gray-800">
                    <div class="bg-blue-900/20 px-4 py-2 border-b border-gray-800 flex items-center justify-between">
                        <span class="text-blue-400 text-sm font-medium">Secure Code Example (Checks-Effects-Interactions)</span>
                    </div>
                    <div class="p-4 overflow-x-auto">
<pre class="font-mono text-sm leading-6">
<span class="code-keyword">pragma solidity</span> ^0.8.0;

<span class="code-keyword">contract</span> SecureVault {
    <span class="code-keyword">mapping</span>(<span class="code-keyword">address</span> => <span class="code-keyword">uint</span>) <span class="code-keyword">public</span> <span class="code-var">balances</span>;
    <span class="code-comment">// Mutex lock (or use OpenZeppelin ReentrancyGuard)</span>
    <span class="code-keyword">bool</span> <span class="code-keyword">internal</span> <span class="code-var">locked</span>;

    <span class="code-keyword">modifier</span> <span class="code-func">noReentrant</span>() {
        <span class="code-func">require</span>(!<span class="code-var">locked</span>, <span class="code-string">"No re-entrancy"</span>);
        <span class="code-var">locked</span> = <span class="code-keyword">true</span>;
        _;
        <span class="code-var">locked</span> = <span class="code-keyword">false</span>;
    }

    <span class="code-keyword">function</span> <span class="code-func">withdraw</span>() <span class="code-keyword">public</span> <span class="code-func">noReentrant</span> {
        <span class="code-keyword">uint</span> <span class="code-var">bal</span> = <span class="code-var">balances</span>[<span class="code-keyword">msg.sender</span>];
        <span class="code-func">require</span>(<span class="code-var">bal</span> > <span class="code-val">0</span>);

        <span class="code-comment">// EFFECT: Update state BEFORE sending funds</span>
        <span class="code-var">balances</span>[<span class="code-keyword">msg.sender</span>] = <span class="code-val">0</span>;

        <span class="code-comment">// INTERACTION: External call happens last</span>
        (<span class="code-keyword">bool</span> <span class="code-var">sent</span>, ) = <span class="code-keyword">msg.sender</span>.<span class="code-func">call</span>{<span class="code-var">value</span>: <span class="code-var">bal</span>}(<span class="code-string">""</span>);
        <span class="code-func">require</span>(<span class="code-var">sent</span>, <span class="code-string">"Failed to send Ether"</span>);
    }
}
</pre>
                    </div>
                </div>
            </section>

            <section>
                <div class="flex items-center gap-2 mb-6 text-yellow-500 font-medium mt-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Real-World Cases
                </div>

                <div class="grid gap-4">
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>The DAO Hack (2016):</strong> The most infamous smart contract hack in history. Attackers drained 3.6 million ETH (worth $60M at the time) using a recursive call attack, leading to the Ethereum Hard Fork (creating Ethereum Classic).</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>Lendf.me (2020):</strong> A DeFi lending protocol on Ethereum was drained of $25M. The attacker exploited an ERC-777 hook (a token standard that notifies senders/receivers via callbacks) to re-enter the lending contract.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>Cream Finance (2021):</strong> Attackers exploited a reentrancy vulnerability involving the AMP token (which is ERC-1820 compliant and has callbacks) to borrow funds, re-enter, and borrow again, stealing roughly $18.8M.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>Fei Protocol (2021):</strong> A vulnerability was found in the Fei/Rari Fuse pools where attackers could re-enter during the `checkBorrow` calculations, though this was ethically disclosed and patched before exploitation.</p>
                    </div>
                </div>
            </section>

            <section>
                <div class="flex items-center gap-2 mb-6 text-green-400 font-medium mt-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Prevention & Mitigation
                </div>

                <div class="grid gap-4">
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Checks-Effects-Interactions (CEI) Pattern:</strong> The golden rule of Solidity. 1. Check conditions. 2. Update state effects (like reducing balances). 3. Interact with external contracts. This ensures state is correct before control is transferred.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>ReentrancyGuard (Mutex):</strong> Use a modifier (like OpenZeppelin's `nonReentrant`) that locks the contract during execution. If a call tries to re-enter while the lock is active, the transaction reverts.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Pull over Push:</strong> Instead of automatically sending funds to users (Push), store their entitlement in a mapping and require them to initiate a withdrawal (Pull). This isolates failures to the individual user.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Gas Limits (Caution):</strong> Historically, using `send()` or `transfer()` prevented reentrancy by limiting gas to 2300, insufficient for state changes. However, this is now discouraged as gas costs change; CEI and Mutex are preferred.</p>
                    </div>
                </div>
            </section>

            <div class="bg-gray-800/40 p-8 rounded-lg mt-12 border border-gray-700/50">
                <h4 class="text-white text-lg font-semibold mb-4">Conclusion</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Reentrancy remains one of the most critical risks in the Web3 ecosystem because it exploits the very nature of composability that makes DeFi powerful. While established patterns like Checks-Effects-Interactions and standard libraries like OpenZeppelin have made protection easier, the emergence of complex token standards (like ERC-777 and ERC-1155) and cross-contract integrations ensures that reentrancy will continue to be a primary vector for sophisticated attacks.
                </p>
            </div>

        </div>

    </div>
</body>
</html>
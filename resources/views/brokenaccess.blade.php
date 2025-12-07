<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broken Access Control - Web Security Article</title>
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
                11 min read
            </div>
        </div>

        <h1 class="text-purple-400 font-medium text-lg mb-2">Broken Access Control</h1>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-100 mb-10 leading-tight">Privilege Escalation & Unauthorized Actions</h2>

        <div class="bg-gray-900/30 border-l-4 border-purple-600 p-6 rounded-r-lg mb-12">
            <div class="flex items-start gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <p class="text-gray-300 leading-relaxed">
                    Broken Access Control occurs when restrictions on what authenticated users are allowed to do are not properly enforced. Attackers can exploit these flaws to access unauthorized functionality and data, such as accessing other users' accounts, viewing sensitive files, modifying other users' data, or changing access rights.
                </p>
            </div>
        </div>

        <div class="space-y-10 text-gray-300">
            
            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">What is Broken Access Control?</h3>
                <p class="mb-4 leading-relaxed">
                    Access control is the policy that enforces users cannot act outside of their intended permissions. Failures typically lead to unauthorized information disclosure, modification, or destruction of all data, or performing a business function outside the user's limits.
                </p>
                <p class="mb-4 leading-relaxed">
                    It consistently ranks at the very top of the OWASP Top 10 because it is difficult to automate detection for; access control logic is often complex and unique to the specific application's business rules.
                </p>
                <p class="leading-relaxed">
                    The vulnerability manifests in two main forms: <strong>Vertical Privilege Escalation</strong> (a standard user gaining admin rights) and <strong>Horizontal Privilege Escalation</strong> (a user accessing data belonging to another user with the same privilege level).
                </p>
            </section>

            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">Common Vulnerabilities</h3>
                <p class="mb-4 leading-relaxed">
                    <strong>Bypassing Access Control Checks:</strong> Modifying the URL, internal application state, or the HTML page, or simply using a custom API attack tool to access APIs without access control checks.
                </p>
                <p class="mb-4 leading-relaxed">
                    <strong>Metadata Manipulation:</strong> Replaying or tampering with a JSON Web Token (JWT) access control token, or a cookie or hidden field manipulated to elevate privileges, or abusing JWT invalidation.
                </p>
                <p class="leading-relaxed">
                    <strong>CORS Misconfiguration:</strong> Allowing API access from unauthorized/untrusted origins, enabling attackers to read sensitive data from a victim's browser.
                </p>
            </section>

            <section>
                

[Image of Broken Access Control diagram]

                <div class="flex items-center gap-2 mb-6 text-purple-400 font-medium mt-6">
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
<span class="code-comment">// Vulnerable: Relies on "security by obscurity"</span>
<span class="code-comment">// The developer hides the link in the UI, but the page is still accessible.</span>

<span class="code-var">$page</span> = <span class="code-var">$_GET</span>[<span class="code-string">'page'</span>];

<span class="code-keyword">if</span> (<span class="code-var">$page</span> === <span class="code-string">'admin_dashboard'</span>) {
    <span class="code-comment">// No check to see if the user is actually an admin!</span>
    <span class="code-comment">// Any user who guesses this URL can access it.</span>
    <span class="code-func">renderAdminDashboard</span>();
}
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
<span class="code-comment">// Secure: Explicit Server-Side Role Check</span>
<span class="code-func">session_start</span>();

<span class="code-var">$page</span> = <span class="code-var">$_GET</span>[<span class="code-string">'page'</span>];
<span class="code-var">$user_role</span> = <span class="code-var">$_SESSION</span>[<span class="code-string">'role'</span>]; <span class="code-comment">// Retrieved from secure session, not user input</span>

<span class="code-keyword">if</span> (<span class="code-var">$page</span> === <span class="code-string">'admin_dashboard'</span>) {
    
    <span class="code-comment">// Check if the user has the 'ADMIN' role</span>
    <span class="code-keyword">if</span> (<span class="code-var">$user_role</span> !== <span class="code-string">'ADMIN'</span>) {
        <span class="code-func">http_response_code</span>(403);
        <span class="code-keyword">die</span>(<span class="code-string">"Access Denied: Insufficient Privileges"</span>);
    }
    
    <span class="code-func">renderAdminDashboard</span>();
}
<span class="code-keyword">?&gt;</span>
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
                        <p class="text-sm leading-relaxed"><strong>Facebook "View As" (2018):</strong> A complex interaction of three different bugs allowed attackers to use the "View As" feature to steal access tokens, granting them full control over 50 million user accounts.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>Citigroup (2011):</strong> Attackers accessed the data of 200,000 credit card customers by simply logging into their own account and changing the account number in the URL bar to other sequential numbers.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>WordPress Plugins:</strong> Thousands of WordPress sites are compromised annually due to plugins that fail to check `current_user_can()` before executing sensitive AJAX actions, allowing subscribers to delete sites or inject admin users.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>Unprotected Admin Interfaces:</strong> Many IoT devices and internal corporate tools are found indexed on Shodan because the developers assumed that "if there is no link to the admin page, no one will find it."</p>
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
                        <p class="text-sm leading-relaxed"><strong>Deny by Default:</strong> Implement access control so that everything is denied unless explicitly allowed. This ensures that if a configuration error occurs, it fails securely (locking users out) rather than insecurely (letting everyone in).</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Model Access Controls:</strong> Enforce record ownership in the code. Never trust client-side data for authorization decisions. Validate the permissions on every single request at the controller/router level.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Log Access Control Failures:</strong> Repeated attempts to access unauthorized data should trigger alerts. This is often a sign of an attacker enumerating endpoints or IDs.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Disable Directory Listing:</strong> Ensure web servers are configured to disable directory listing and ensure file metadata (e.g., .git folders) and backup files are not present within web roots.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Role-Based Access Control (RBAC):</strong> Implement a robust RBAC or Attribute-Based Access Control (ABAC) system. Hardcoding roles (e.g., `if user == 'Steve'`) is fragile and unscalable.</p>
                    </div>
                </div>
            </section>

            <div class="bg-gray-800/40 p-8 rounded-lg mt-12 border border-gray-700/50">
                <h4 class="text-white text-lg font-semibold mb-4">Conclusion</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Broken Access Control is often the result of "bolting on" security at the end of development rather than designing it from the start. Unlike some injection attacks which can be caught by generic firewalls, access control logic is unique to the application. Therefore, prevention requires a disciplined approach to coding where every endpoint performs a mandatory, centralized check of the user's authority before executing any action.
                </p>
            </div>

        </div>

    </div>
</body>
</html>
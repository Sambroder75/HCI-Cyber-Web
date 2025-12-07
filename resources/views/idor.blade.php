<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDOR - Web Security Article</title>
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
                8 min read
            </div>
        </div>

        <h1 class="text-purple-400 font-medium text-lg mb-2">IDOR</h1>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-100 mb-10 leading-tight">Insecure Direct Object Reference - A Critical Access Control Vulnerability</h2>

        <div class="bg-gray-900/30 border-l-4 border-purple-600 p-6 rounded-r-lg mb-12">
            <div class="flex items-start gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <p class="text-gray-300 leading-relaxed">
                    Insecure Direct Object Reference (IDOR) is a type of access control vulnerability that occurs when an application provides direct access to objects based on user-supplied input. As a result, attackers can bypass authorization and access resources directly by modifying the value of a reference parameter.
                </p>
            </div>
        </div>

        <div class="space-y-10 text-gray-300">
            
            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">What is IDOR?</h3>
                <p class="mb-4 leading-relaxed">
                    IDOR vulnerabilities occur when an application exposes a reference to an internal implementation object, such as a file, directory, database record, or key, as a URL or parameter. Attackers can manipulate these references to access unauthorized data.
                </p>
                <p class="mb-4 leading-relaxed">
                    This vulnerability is particularly dangerous because it often requires minimal technical skill to exploit. An attacker simply needs to modify a parameter value (like changing a user ID from 1234 to 1235) to potentially access another user's data.
                </p>
                <p class="leading-relaxed">
                    IDOR is ranked as one of the OWASP Top 10 security risks and has been responsible for numerous data breaches across various industries.
                </p>
            </section>

            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">How IDOR Attacks Work</h3>
                <p class="mb-4 leading-relaxed">
                    The attack typically follows this pattern: First, the attacker identifies a direct object reference in the application, such as a user ID, account number, or file name in the URL or request parameters.
                </p>
                <p class="mb-4 leading-relaxed">
                    Next, they modify this reference to access objects belonging to other users. For example, changing <code class="bg-gray-800 text-gray-200 px-1 py-0.5 rounded text-sm">/profile?user_id=100</code> to <code class="bg-gray-800 text-gray-200 px-1 py-0.5 rounded text-sm">/profile?user_id=101</code> to view another user's profile.
                </p>
                <p class="leading-relaxed">
                    If the application doesn't properly verify that the user has permission to access the requested object, the attack succeeds, and unauthorized data is exposed.
                </p>
            </section>

            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">Common Scenarios</h3>
                <p class="mb-4 leading-relaxed">
                    IDOR vulnerabilities commonly appear in several scenarios: viewing other users' profiles by changing user IDs, accessing private documents by modifying document IDs, downloading invoices or receipts belonging to other customers, and modifying account settings of other users.
                </p>
                <p class="leading-relaxed">
                    These vulnerabilities can also be found in API endpoints, especially in REST APIs where resource IDs are exposed in the URL path or query parameters.
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
<span class="code-comment">// Vulnerable code - No authorization check</span>
<span class="code-var">$user_id</span> = <span class="code-var">$_GET</span>[<span class="code-string">'id'</span>];
<span class="code-var">$query</span> = <span class="code-string">"SELECT * FROM users WHERE id = <span class="code-var">$user_id</span>"</span>;
<span class="code-var">$result</span> = <span class="code-func">mysqli_query</span>(<span class="code-var">$conn</span>, <span class="code-var">$query</span>);
<span class="code-var">$user_data</span> = <span class="code-func">mysqli_fetch_assoc</span>(<span class="code-var">$result</span>);
<span class="code-func">echo</span> <span class="code-func">json_encode</span>(<span class="code-var">$user_data</span>);
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
<span class="code-comment">// Secure code - With authorization check</span>
<span class="code-var">$user_id</span> = <span class="code-var">$_GET</span>[<span class="code-string">'id'</span>];
<span class="code-var">$current_user_id</span> = <span class="code-var">$_SESSION</span>[<span class="code-string">'user_id'</span>];

<span class="code-comment">// Check if user is authorized to access this data</span>
<span class="code-keyword">if</span> (<span class="code-var">$user_id</span> != <span class="code-var">$current_user_id</span> && !<span class="code-func">is_admin</span>(<span class="code-var">$current_user_id</span>)) {
    <span class="code-func">http_response_code</span>(403);
    <span class="code-func">echo</span> <span class="code-func">json_encode</span>([<span class="code-string">'error'</span> => <span class="code-string">'Unauthorized access'</span>]);
    <span class="code-keyword">exit</span>;
}

<span class="code-var">$query</span> = <span class="code-string">"SELECT * FROM users WHERE id = <span class="code-var">$user_id</span>"</span>;
<span class="code-var">$result</span> = <span class="code-func">mysqli_query</span>(<span class="code-var">$conn</span>, <span class="code-var">$query</span>);
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
                        <p class="text-sm leading-relaxed">In 2019, a major social media platform suffered an IDOR vulnerability that allowed attackers to access private user information by simply incrementing user IDs in API calls.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed">A popular e-commerce site experienced a breach where customers could view other customers' order details and shipping addresses by changing the order ID parameter.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed">A healthcare application had an IDOR flaw that exposed patient medical records when attackers modified the patient ID in the URL, leading to a HIPAA violation and significant fines.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed">A banking application allowed users to view other customers' account statements by changing the account number parameter, resulting in a major security incident.</p>
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
                        <p class="text-sm leading-relaxed">Implement proper access control checks on the server side. Always verify that the authenticated user has permission to access the requested resource.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed">Use indirect reference maps. Instead of exposing actual database IDs, use temporary reference maps (tokens or hashes) that map to the real object.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed">Implement UUID (Universally Unique Identifiers) instead of sequential IDs. This makes it harder for attackers to guess valid object references.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed">Apply defense in depth by combining multiple security measures: authentication, authorization, input validation, and audit logging.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed">Regularly conduct security testing including penetration testing and code reviews to identify IDOR vulnerabilities.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed">Use framework-level authorization checks. Many modern frameworks provide built-in authorization mechanisms that should be utilized.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed">Log all access attempts to sensitive resources and implement monitoring to detect suspicious patterns of access.</p>
                    </div>
                </div>
            </section>

            <div class="bg-gray-800/40 p-8 rounded-lg mt-12 border border-gray-700/50">
                <h4 class="text-white text-lg font-semibold mb-4">Conclusion</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    IDOR vulnerabilities represent a critical security risk that can lead to unauthorized data access and privacy breaches. The key to preventing IDOR is implementing robust server-side authorization checks and never trusting user input. Organizations must ensure that every object access request is validated against the user's permissions, regardless of how the request is structured. By following security best practices, implementing proper access controls, and conducting regular security assessments, developers can significantly reduce the risk of IDOR vulnerabilities in their applications.
                </p>
            </div>

        </div>

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection - Web Security Article</title>
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
        .code-sql { color: #fbbf24; } /* Amber */
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
                10 min read
            </div>
        </div>

        <h1 class="text-purple-400 font-medium text-lg mb-2">SQL Injection (SQLi)</h1>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-100 mb-10 leading-tight">Database Manipulation & Unauthorized Data Access</h2>

        <div class="bg-gray-900/30 border-l-4 border-purple-600 p-6 rounded-r-lg mb-12">
            <div class="flex items-start gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                </svg>
                <p class="text-gray-300 leading-relaxed">
                    SQL Injection (SQLi) is a web security vulnerability that allows an attacker to interfere with the queries that an application makes to its database. This generally allows an attacker to view data that they are not normally able to retrieve, such as data belonging to other users, or any other data that the application itself is able to access.
                </p>
            </div>
        </div>

        <div class="space-y-10 text-gray-300">
            
            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">What is SQL Injection?</h3>
                <p class="mb-4 leading-relaxed">
                    SQLi occurs when user-supplied data is concatenated directly into a database command without proper sanitization or parameterization. The database engine cannot distinguish between the intended command and the data provided by the user, executing the malicious input as code.
                </p>
                <p class="mb-4 leading-relaxed">
                    For example, in a login form, if an attacker enters <code class="bg-gray-800 text-gray-200 px-1 py-0.5 rounded text-sm">' OR '1'='1</code> into the username field, the resulting query might become <code class="bg-gray-800 text-gray-200 px-1 py-0.5 rounded text-sm">SELECT * FROM users WHERE user = '' OR '1'='1'</code>. Since '1'='1' is always true, the database returns all records, bypassing authentication.
                </p>
                <p class="leading-relaxed">
                    Successful SQLi attacks can result in unauthorized access to sensitive data, modification of data (insert/update/delete), or administrative operations on the database server.
                </p>
            </section>

            <section>
                <h3 class="text-xl font-semibold text-gray-100 mb-4">Types of SQL Injection</h3>
                <p class="mb-4 leading-relaxed">
                    <strong>In-band SQLi (Classic):</strong> The most common and easy-to-exploit type. It occurs when an attacker is able to use the same communication channel to both launch the attack and gather results (e.g., Error-based SQLi or Union-based SQLi).
                </p>
                <p class="mb-4 leading-relaxed">
                    <strong>Inferential SQLi (Blind):</strong> No data is actually transferred via the web application. The attacker reconstructs the database structure by sending payloads, observing the web application's response and the resulting behavior (e.g., Boolean-based or Time-based Blind SQLi).
                </p>
                <p class="leading-relaxed">
                    <strong>Out-of-band SQLi:</strong> Occurs when the attacker is unable to use the same channel to launch the attack and gather results, forcing the application to generate a DNS or HTTP request to a server controlled by the attacker.
                </p>
            </section>

            <section>
                

[Image of SQL injection attack diagram]

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
<span class="code-comment">// Vulnerable: Direct string concatenation</span>
<span class="code-var">$username</span> = <span class="code-var">$_POST</span>[<span class="code-string">'username'</span>];
<span class="code-var">$password</span> = <span class="code-var">$_POST</span>[<span class="code-string">'password'</span>];

<span class="code-comment">// If username is: admin' --</span>
<span class="code-comment">// The query ignores the password check entirely</span>
<span class="code-var">$query</span> = <span class="code-string">"SELECT * FROM users WHERE user = '"</span> . <span class="code-var">$username</span> . <span class="code-string">"' AND pass = '"</span> . <span class="code-var">$password</span> . <span class="code-string">"'"</span>;

<span class="code-var">$result</span> = <span class="code-var">$conn</span>-><span class="code-func">query</span>(<span class="code-var">$query</span>);
<span class="code-keyword">?&gt;</span>
</pre>
                    </div>
                </div>

                <div class="bg-[#111115] rounded-lg overflow-hidden border border-gray-800">
                    <div class="bg-blue-900/20 px-4 py-2 border-b border-gray-800 flex items-center justify-between">
                        <span class="text-blue-400 text-sm font-medium">Secure Code Example (PHP PDO)</span>
                    </div>
                    <div class="p-4 overflow-x-auto">
<pre class="font-mono text-sm leading-6">
<span class="code-keyword">&lt;?php</span>
<span class="code-comment">// Secure: Using Prepared Statements</span>
<span class="code-var">$username</span> = <span class="code-var">$_POST</span>[<span class="code-string">'username'</span>];
<span class="code-var">$password</span> = <span class="code-var">$_POST</span>[<span class="code-string">'password'</span>];

<span class="code-comment">// The database treats the input strictly as data, not executable code</span>
<span class="code-var">$stmt</span> = <span class="code-var">$pdo</span>-><span class="code-func">prepare</span>(<span class="code-string">'SELECT * FROM users WHERE user = :user AND pass = :pass'</span>);

<span class="code-var">$stmt</span>-><span class="code-func">execute</span>([
    <span class="code-string">'user'</span> => <span class="code-var">$username</span>, 
    <span class="code-string">'pass'</span> => <span class="code-var">$password</span>
]);

<span class="code-var">$user</span> = <span class="code-var">$stmt</span>-><span class="code-func">fetch</span>();
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
                        <p class="text-sm leading-relaxed"><strong>TalkTalk Breach (2015):</strong> A massive SQL injection attack on the UK telecommunications provider exposed the personal data of nearly 157,000 customers, costing the company an estimated £77 million and resulting in a record fine.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>The Heartland Payment Systems (2008):</strong> One of the largest data breaches in history, where attackers used SQL injection to install spyware on the company's payment processing system, compromising over 130 million credit card numbers.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>Tesla (2014):</strong> Security researchers discovered a Blind SQL Injection vulnerability in Tesla's website that could have allowed attackers to gain administrative access and steal user data, though it was patched before exploitation.</p>
                    </div>
                    <div class="bg-[#111115] border border-yellow-900/30 p-4 rounded-lg">
                        <p class="text-sm leading-relaxed"><strong>Fortnite / Epic Games (2019):</strong> A vulnerability chain starting with SQL injection in an old sub-domain allowed attackers to steal user access tokens and take over accounts without passwords.</p>
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
                        <p class="text-sm leading-relaxed"><strong>Prepared Statements (Parameterized Queries):</strong> The most effective defense. They ensure that the database treats user input as data, not executable code, regardless of what the input contains.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Stored Procedures:</strong> Similar to prepared statements, stored procedures encapsulate the SQL query on the database server, preventing the application from manipulating the query structure.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Input Validation (Allow-listing):</strong> Strictly validate user input against a known set of allowed characters or formats. For example, ensure an "Age" field only contains integers.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Principle of Least Privilege:</strong> Ensure the database user account used by the web application has only the minimum necessary permissions. It should not have root/admin access or the ability to drop tables.</p>
                    </div>
                    <div class="bg-[#051105] border border-green-900/30 p-4 rounded-lg flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm leading-relaxed"><strong>Web Application Firewall (WAF):</strong> A WAF can help detect and block common SQL injection patterns in incoming web traffic, providing an additional layer of security.</p>
                    </div>
                </div>
            </section>

            <div class="bg-gray-800/40 p-8 rounded-lg mt-12 border border-gray-700/50">
                <h4 class="text-white text-lg font-semibold mb-4">Conclusion</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    SQL Injection remains a persistent threat despite being well-understood for decades. It is consistently listed in the OWASP Top 10 due to the severity of its impact, which can range from data leaks to full system compromise. The shift towards modern ORMs and the disciplined use of parameterized queries has made it easier to prevent, but legacy code and developer oversight ensure it remains a critical vector that security professionals must constantly monitor.
                </p>
            </div>

        </div>

    </div>
</body>
</html>
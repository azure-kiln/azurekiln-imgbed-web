<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html class="light" lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>登录 - 数字馆长 Digital Curator</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        // Tailwind config preserved from template
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#004ac6",
                        "primary-container": "#2563eb",
                        "surface": "#f7f9fb",
                        "on-surface": "#191c1e",
                        "on-surface-variant": "#434655",
                        "surface-container-highest": "#e0e3e5",
                        "surface-container-low": "#f2f4f6",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#737686",
                        "outline-variant": "#c3c6d7",
                        "error": "#ba1a1a",
                        "secondary": "#495c95",
                    },
                    fontFamily: {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .primary-gradient {
            background: linear-gradient(135deg, #004ac6 0%, #2563eb 100%);
        }
    </style>
</head>
<body class="bg-surface font-body text-on-surface min-h-screen flex flex-col selection:bg-primary/20 selection:text-primary">
    <main class="flex-grow flex items-center justify-center px-6 py-12 relative overflow-hidden">
        <!-- Abstract Background Element -->
        <div class="absolute top-[-10%] left-[-5%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[40%] h-[40%] bg-secondary/5 rounded-full blur-[120px]"></div>
        
        <div class="w-full max-w-md z-10">
            <!-- Brand Anchor -->
            <div class="flex flex-col items-center mb-10">
                <div class="w-12 h-12 primary-gradient rounded-xl mb-4 flex items-center justify-center shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-white text-2xl" data-icon="gallery_thumbnail">gallery_thumbnail</span>
                </div>
                <h1 class="font-headline text-3xl font-extrabold tracking-tight text-on-surface">数字馆长</h1>
                <p class="font-label text-sm uppercase tracking-widest text-outline mt-2">Digital Curator</p>
            </div>
            
            <!-- Login Card -->
            <div class="bg-surface-container-lowest rounded-xl p-8 shadow-[0_12px_40px_rgba(25,28,30,0.06)]">
                <h2 class="font-headline text-xl font-bold mb-6 text-on-surface">欢迎回来</h2>
                
                <form id="loginForm" class="space-y-5">
                    <div id="errorMsg" class="hidden bg-error/10 text-error px-4 py-3 rounded-lg text-sm font-bold"></div>
                    
                    <div class="space-y-2">
                        <label class="font-label text-xs font-bold text-outline-variant uppercase tracking-wider block ml-1">用户名或邮箱</label>
                        <div class="relative group">
                            <input id="username" required class="w-full bg-surface-container-highest border-none rounded-lg px-4 py-3 text-on-surface placeholder:text-outline/50 focus:ring-2 focus:ring-primary/40 transition-all duration-200" placeholder="admin" type="text" />
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex justify-between items-center ml-1">
                            <label class="font-label text-xs font-bold text-outline-variant uppercase tracking-wider">密码</label>
                            <a class="text-xs font-medium text-primary hover:underline transition-all" href="#">忘记密码？</a>
                        </div>
                        <div class="relative group">
                            <input id="password" required class="w-full bg-surface-container-highest border-none rounded-lg px-4 py-3 text-on-surface placeholder:text-outline/50 focus:ring-2 focus:ring-primary/40 transition-all duration-200" placeholder="••••••••" type="password" />
                        </div>
                    </div>
                    
                    <button id="submitBtn" class="w-full primary-gradient text-white font-bold py-3.5 rounded-lg shadow-md hover:shadow-lg active:scale-[0.98] transition-all duration-150 flex items-center justify-center gap-2 mt-4" type="submit">
                        <span id="btnText">立即登录</span>
                        <span class="material-symbols-outlined text-lg" data-icon="login">login</span>
                    </button>
                </form>
                
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-surface-container-highest"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-surface-container-lowest px-4 text-outline font-medium tracking-tighter">或者通过以下方式</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center gap-3 py-3 px-4 bg-surface-container-low rounded-lg hover:bg-surface-container-highest transition-colors duration-200 group">
                        <span class="text-sm font-semibold text-on-surface-variant">SSO 登录</span>
                    </button>
                    <button class="flex items-center justify-center gap-3 py-3 px-4 bg-surface-container-low rounded-lg hover:bg-surface-container-highest transition-colors duration-200 group">
                        <span class="material-symbols-outlined text-xl text-on-surface-variant group-hover:text-on-surface" data-icon="terminal">terminal</span>
                        <span class="text-sm font-semibold text-on-surface-variant">GitHub</span>
                    </button>
                </div>
            </div>
            
            <p class="text-center mt-8 text-on-surface-variant text-sm">
                还没有账号？ 
                <a class="text-primary font-bold hover:underline transition-all ml-1" href="register.php">立即注册</a>
            </p>
        </div>
    </main>

    <script>
        const API_BASE_URL = "<?php echo $API_BASE_URL; ?>";

        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const errorMsg = document.getElementById('errorMsg');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');

            try {
                submitBtn.disabled = true;
                btnText.innerText = '登录中...';
                errorMsg.classList.add('hidden');
                
                const response = await fetch(`${API_BASE_URL}/auth/login`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ username, password })
                });

                const data = await response.json();
                
                if (response.ok && data.token) {
                    // 保存 Token 和用户信息
                    localStorage.setItem('auth_token', data.token);
                    localStorage.setItem('user_info', JSON.stringify(data.user));
                    
                    // 跳转回主应用
                    window.location.href = 'index.php';
                } else {
                    errorMsg.textContent = data.error || '用户名或密码错误。';
                    errorMsg.classList.remove('hidden');
                }
            } catch (err) {
                errorMsg.textContent = '网络错误，请稍后再试。';
                errorMsg.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                btnText.innerText = '立即登录';
            }
        });
    </script>
</body>
</html>

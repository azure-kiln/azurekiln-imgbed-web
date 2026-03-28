<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html class="light" lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>注册 - 数字馆长 Digital Curator</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        // (Tailwind config preserved from template)
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
                        "surface-container-lowest": "#ffffff",
                        "outline": "#737686",
                        "outline-variant": "#c3c6d7",
                        "error": "#ba1a1a",
                        "secondary": "#495c95",
                        "surface-container-low": "#f2f4f6",
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
<body class="bg-surface font-body text-on-surface selection:bg-primary/20 selection:text-primary">
    <main class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-primary/5 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-secondary/5 blur-[120px]"></div>
        
        <!-- Registration Container -->
        <div class="w-full max-w-lg z-10">
            <div class="text-center mb-10">
                <h1 class="font-headline font-extrabold text-4xl tracking-tight text-primary mb-2">数字馆长</h1>
                <p class="font-label text-sm uppercase tracking-widest text-outline">Digital Curator</p>
            </div>
            
            <div class="bg-surface-container-lowest rounded-xl p-8 md:p-12 shadow-[0_12px_40px_rgba(25,28,30,0.06)]">
                <div class="mb-10">
                    <h2 class="font-headline font-bold text-2xl text-on-surface">创建新账户</h2>
                    <p class="text-on-surface-variant mt-2 font-medium">开始您的数字化资产管理之旅</p>
                </div>
                
                <form id="registerForm" class="space-y-6">
                    <div id="errorMsg" class="hidden bg-error/10 text-error px-4 py-3 rounded-lg text-sm font-bold"></div>
                    
                    <div class="space-y-2">
                        <label class="font-label text-xs font-bold uppercase tracking-wider text-outline px-1">用户名</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[20px]">person</span>
                            </div>
                            <input id="username" required class="w-full pl-12 pr-4 py-3.5 bg-surface-container-highest rounded-lg border-none focus:ring-2 focus:ring-primary/40 transition-all font-medium text-on-surface placeholder:text-outline/60" placeholder="输入您的用户名" type="text"/>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="font-label text-xs font-bold uppercase tracking-wider text-outline px-1">密码</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">lock</span>
                                </div>
                                <input id="password" required class="w-full pl-12 pr-4 py-3.5 bg-surface-container-highest rounded-lg border-none focus:ring-2 focus:ring-primary/40 transition-all font-medium text-on-surface placeholder:text-outline/60" placeholder="••••••••" type="password"/>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-label text-xs font-bold uppercase tracking-wider text-outline px-1">确认密码</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-outline group-focus-within:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">verified_user</span>
                                </div>
                                <input id="confirmPassword" required class="w-full pl-12 pr-4 py-3.5 bg-surface-container-highest rounded-lg border-none focus:ring-2 focus:ring-primary/40 transition-all font-medium text-on-surface placeholder:text-outline/60" placeholder="••••••••" type="password"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3 pt-2">
                        <div class="flex items-center h-5">
                            <input required class="w-4 h-4 text-primary bg-surface-container-highest border-none rounded focus:ring-primary/40" id="terms" type="checkbox"/>
                        </div>
                        <label class="text-sm text-on-surface-variant font-medium leading-tight" for="terms">
                            我同意 <a class="text-primary hover:underline decoration-2 underline-offset-4" href="#">服务条款</a> 和 <a class="text-primary hover:underline decoration-2 underline-offset-4" href="#">隐私政策</a>
                        </label>
                    </div>
                    
                    <button id="submitBtn" class="w-full primary-gradient text-white font-headline font-bold py-4 rounded-lg shadow-lg shadow-primary/20 hover:scale-[1.02] active:scale-95 transition-all duration-150" type="submit">
                        立即注册
                    </button>
                </form>
                
                <div class="mt-8 text-center pt-8 border-t border-surface-container-highest border-dashed">
                    <p class="text-on-surface-variant font-medium">
                        已经拥有账户？ 
                        <a class="text-primary font-bold hover:underline decoration-2 underline-offset-4 ml-1" href="login.php">登录控制台</a>
                    </p>
                </div>
            </div>
            <div class="mt-12 flex justify-center space-x-6">
                <div class="flex items-center space-x-2">
                    <span class="material-symbols-outlined text-outline text-lg">shield</span>
                    <span class="font-label text-xs uppercase tracking-widest text-outline">高强度加密</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="material-symbols-outlined text-outline text-lg">cloud_done</span>
                    <span class="font-label text-xs uppercase tracking-widest text-outline">全球分发</span>
                </div>
            </div>
        </div>
    </main>

    <script>
        const API_BASE_URL = "<?php echo $API_BASE_URL; ?>";

        document.getElementById('registerForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const errorMsg = document.getElementById('errorMsg');
            const btn = document.getElementById('submitBtn');

            if (password !== confirmPassword) {
                errorMsg.textContent = '两次输入的密码不一致！';
                errorMsg.classList.remove('hidden');
                return;
            }

            try {
                btn.disabled = true;
                btn.innerHTML = '正在注册...';
                errorMsg.classList.add('hidden');
                
                const response = await fetch(`${API_BASE_URL}/users`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ username, password })
                });

                const data = await response.json();
                
                if (response.ok) {
                    alert('注册成功，请使用新账号登录！');
                    window.location.href = 'login.php';
                } else {
                    errorMsg.textContent = data.error || '注册失败，开放注册可能已被管理员关闭。';
                    errorMsg.classList.remove('hidden');
                }
            } catch (err) {
                errorMsg.textContent = '网络错误，请稍后再试。';
                errorMsg.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '立即注册';
            }
        });
    </script>
</body>
</html>

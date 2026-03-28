<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html class="light" lang="zh-CN">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>数字馆长 | Digital Curator</title>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary-fixed": "#dbe1ff",
                        "on-error": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed-variant": "#7d2d00",
                        "surface-container-low": "#f2f4f6",
                        "on-secondary-fixed-variant": "#31447b",
                        "surface-bright": "#f7f9fb",
                        "secondary": "#495c95",
                        "tertiary-fixed-dim": "#ffb596",
                        "surface-container-highest": "#e0e3e5",
                        "secondary-fixed": "#dbe1ff",
                        "secondary-fixed-dim": "#b4c5ff",
                        "inverse-surface": "#2d3133",
                        "on-tertiary-container": "#ffede6",
                        "on-surface": "#191c1e",
                        "error-container": "#ffdad6",
                        "outline": "#737686",
                        "surface": "#f7f9fb",
                        "on-primary-container": "#eeefff",
                        "primary-fixed-dim": "#b4c5ff",
                        "tertiary-container": "#bc4800",
                        "primary": "#004ac6",
                        "outline-variant": "#c3c6d7",
                        "on-secondary-container": "#394c84",
                        "surface-dim": "#d8dadc",
                        "on-primary": "#ffffff",
                        "surface-tint": "#0053db",
                        "surface-container": "#eceef0",
                        "background": "#f7f9fb",
                        "primary-container": "#2563eb",
                        "tertiary-fixed": "#ffdbcd",
                        "surface-container-high": "#e6e8ea",
                        "inverse-on-surface": "#eff1f3",
                        "on-primary-fixed-variant": "#003ea8",
                        "on-secondary": "#ffffff",
                        "surface-variant": "#e0e3e5",
                        "tertiary": "#943700",
                        "on-secondary-fixed": "#00174b",
                        "on-tertiary-fixed": "#360f00",
                        "on-background": "#191c1e",
                        "secondary-container": "#acbfff",
                        "on-error-container": "#93000a",
                        "on-tertiary": "#ffffff",
                        "error": "#ba1a1a",
                        "on-surface-variant": "#434655",
                        "inverse-primary": "#b4c5ff",
                        "on-primary-fixed": "#00174b"
                    },
                    fontFamily: {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .primary-gradient {
            background: linear-gradient(135deg, #004ac6 0%, #2563eb 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Manrope', sans-serif;
        }

        .hidden-view {
            display: none !important;
        }

        .bg-glass {
            background: rgba(247, 249, 251, 0.8);
            backdrop-filter: blur(12px);
        }
    </style>
</head>

<body class="bg-surface text-on-surface antialiased overflow-x-hidden">

    <!-- Auth check script before rendering page content -->
    <script>
        const token = localStorage.getItem('auth_token');
        if (!token) {
            window.location.href = 'login.php';
        }
    </script>

    <!-- Mobile Menu Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- SideNavBar -->
    <aside id="sidebar"
        class="h-screen w-64 fixed left-0 top-0 bg-slate-50 flex flex-col py-8 px-4 z-50 border-r border-slate-200 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="mb-10 px-2 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-bold text-slate-900 font-manrope">数字馆长</h1>
                <p class="text-xs text-slate-500 font-manrope mt-1 uppercase tracking-widest font-semibold">技术工作站</p>
            </div>
            <button class="lg:hidden p-2 rounded-lg hover:bg-slate-200 transition-colors" onclick="toggleSidebar()">
                <span class="material-symbols-outlined text-slate-500">close</span>
            </button>
        </div>
        <nav class="flex-1 space-y-2">
            <a href="#" data-target="view-upload"
                class="nav-btn flex items-center gap-3 px-4 py-3 rounded-lg text-blue-600 border-r-2 border-blue-600 bg-slate-200/50 font-manrope text-sm font-semibold tracking-tight transition-colors">
                <span class="material-symbols-outlined" data-icon="cloud_upload">cloud_upload</span>
                <span>上传</span>
            </a>
            <a href="#" data-target="view-gallery"
                class="nav-btn flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 hover:bg-slate-200/50 transition-colors font-manrope text-sm font-semibold tracking-tight">
                <span class="material-symbols-outlined" data-icon="photo_library">photo_library</span>
                <span>图库</span>
            </a>
            <a href="#" data-target="view-settings"
                class="nav-btn flex items-center gap-3 px-4 py-3 rounded-lg text-slate-500 hover:bg-slate-200/50 transition-colors font-manrope text-sm font-semibold tracking-tight">
                <span class="material-symbols-outlined" data-icon="settings">settings</span>
                <span>设置</span>
            </a>
        </nav>
        <div class="mt-auto px-2">
            <button onclick="document.querySelector('[data-target=\'view-upload\']').click()"
                class="w-full py-3 px-4 rounded-lg primary-gradient text-white font-semibold text-sm flex items-center justify-center gap-2 hover:opacity-90 active:scale-95 transition-all">
                <span class="material-symbols-outlined text-sm" data-icon="add">add</span> 新建资产
            </button>
            <div class="mt-8 flex items-center gap-3 relative group cursor-pointer" id="userProfileBtn">
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-bold text-sm"
                    id="userAvatar">U</div>
                <div class="overflow-hidden flex-1">
                    <p class="text-xs font-bold truncate" id="userNameDisplay">用户名</p>
                    <p class="text-[10px] text-slate-500 truncate">专业账户</p>
                </div>
                <span class="material-symbols-outlined text-sm text-slate-400">logout</span>
            </div>
        </div>
    </aside>

    <!-- TopNavBar -->
    <header
        class="fixed top-0 right-0 left-0 lg:left-64 h-16 z-30 bg-white/80 backdrop-blur-xl flex justify-between items-center px-4 lg:px-8 shadow-sm">
        <div class="flex items-center gap-4 flex-1">
            <button id="menuToggle" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors" onclick="toggleSidebar()">
                <span class="material-symbols-outlined text-2xl text-slate-600">menu</span>
            </button>
            <div class="relative flex-1 max-w-xl hidden sm:block">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg"
                    data-icon="search">search</span>
                <input
                    class="w-full bg-surface-container-highest border-none rounded-lg py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/40 focus:outline-none transition-all"
                    placeholder="搜索资产、标签或维度..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-4 lg:gap-6">
            <button onclick="document.querySelector('[data-target=\'view-upload\']').click()"
                class="primary-gradient text-white px-4 lg:px-5 py-2 rounded-lg text-sm font-bold shadow-md hover:opacity-90 active:scale-95 transition-all">快速上传</button>
        </div>
    </header>

    <!-- Content Canvas -->
    <main class="lg:ml-64 pt-20 lg:pt-24 px-4 lg:px-10 pb-12 min-h-screen">

        <!-- ======================= UPLOAD VIEW ======================= -->
        <div id="view-upload" class="view-section">
            <div class="mb-8 sm:mb-12">
                <span
                    class="label-md uppercase tracking-widest text-primary font-bold text-[0.6875rem] block mb-2">资产管理</span>
                <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-on-surface">上传中心</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Dropzone -->
                <div class="lg:col-span-7 space-y-8">
                    <div id="dropzone" class="relative group cursor-pointer">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-primary/20 to-primary-container/20 rounded-xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200">
                        </div>
                        <div
                            class="relative bg-surface-container-lowest border-2 border-dashed border-outline-variant/50 rounded-xl p-8 sm:p-16 flex flex-col items-center justify-center transition-all hover:bg-surface-container-low hover:border-primary/50">
                            <input type="file" id="fileInput" class="hidden" accept="image/*" />
                            <div class="w-20 h-20 bg-primary-fixed rounded-full flex items-center justify-center mb-6">
                                <span class="material-symbols-outlined text-4xl text-primary"
                                    data-icon="cloud_upload">cloud_upload</span>
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">将图片拖拽到此处</h3>
                            <p class="text-on-surface-variant text-sm text-center max-w-xs mb-8">
                                点击或拖拽上传 JPG, PNG, WEBP, GIF, SVG 等。单张最大限制 50MB。
                            </p>
                            <button onclick="document.getElementById('fileInput').click()"
                                class="px-8 py-3 bg-primary text-white font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all active:scale-95">
                                选择文件
                            </button>
                        </div>
                    </div>

                    <div class="bg-surface-container-low rounded-xl p-4 sm:p-8">
                        <h4 class="text-lg font-bold mb-6 flex items-center justify-between">
                            上传队列 <span id="queueCount"
                                class="text-xs font-mono text-on-surface-variant bg-surface-container-highest px-2 py-1 rounded">0
                                个文件</span>
                        </h4>
                        <div id="uploadQueue" class="space-y-4">
                            <!-- Items appear here via JS -->
                        </div>
                    </div>
                </div>

                <!-- Links Sidebar -->
                <div class="lg:col-span-5 space-y-8 sticky top-24">
                    <div class="glass-effect border border-white/20 p-4 sm:p-8 rounded-2xl shadow-sm bg-white/40">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="material-symbols-outlined text-primary" data-icon="link">link</span>
                            <h4 class="text-xl font-extrabold tracking-tight">自动提取链接</h4>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label
                                    class="block text-[10px] font-mono uppercase tracking-widest text-on-surface-variant mb-2">Markdown
                                    (论坛/GitHub)</label>
                                <div class="flex gap-2">
                                    <input id="linkMarkdown"
                                        class="flex-1 bg-surface-container-highest border-none text-xs font-mono rounded-lg py-3 px-4 focus:ring-1 focus:ring-primary/20"
                                        readonly type="text" value="请先上传图片..." />
                                    <button
                                        class="copy-btn bg-surface-container-high hover:bg-surface-container-highest p-3 rounded-lg transition-colors group"
                                        data-target="linkMarkdown">
                                        <span
                                            class="material-symbols-outlined text-sm group-active:scale-90 transition-transform">content_copy</span>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label
                                    class="block text-[10px] font-mono uppercase tracking-widest text-on-surface-variant mb-2">HTML
                                    Embed (网页)</label>
                                <div class="flex gap-2">
                                    <input id="linkHtml"
                                        class="flex-1 bg-surface-container-highest border-none text-xs font-mono rounded-lg py-3 px-4 focus:ring-1 focus:ring-primary/20"
                                        readonly type="text" value="请先上传图片..." />
                                    <button
                                        class="copy-btn bg-surface-container-high hover:bg-surface-container-highest p-3 rounded-lg transition-colors group"
                                        data-target="linkHtml">
                                        <span
                                            class="material-symbols-outlined text-sm group-active:scale-90 transition-transform">content_copy</span>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label
                                    class="block text-[10px] font-mono uppercase tracking-widest text-on-surface-variant mb-2">Direct
                                    URL (直链)</label>
                                <div class="flex gap-2">
                                    <input id="linkDirect"
                                        class="flex-1 bg-surface-container-highest border-none text-xs font-mono rounded-lg py-3 px-4 focus:ring-1 focus:ring-primary/20"
                                        readonly type="text" value="请先上传图片..." />
                                    <button
                                        class="copy-btn bg-surface-container-high hover:bg-surface-container-highest p-3 rounded-lg transition-colors group"
                                        data-target="linkDirect">
                                        <span
                                            class="material-symbols-outlined text-sm group-active:scale-90 transition-transform">content_copy</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Visual Preview -->
                    <div
                        class="bg-surface-container-low p-2 rounded-2xl overflow-hidden aspect-video relative group flex items-center justify-center">
                        <img id="uploadPreview" alt="预览图"
                            class="w-full h-full object-contain rounded-xl transition-transform duration-700 hidden" />
                        <span id="uploadPreviewText" class="text-outline text-sm font-bold">暂无上传图片</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================= GALLERY VIEW ======================= -->
        <div id="view-gallery" class="view-section hidden-view">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-6">
                <div>
                    <span class="text-primary font-bold text-xs uppercase tracking-[0.2em] mb-2 block">资产仓库</span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-on-surface">图床画廊</h2>
                </div>
                <div class="flex items-center gap-3">
                    <button onclick="fetchGallery(1)"
                        class="flex items-center gap-2 bg-surface-container-low px-4 py-2.5 rounded-lg text-xs font-bold hover:bg-surface-container-high transition-all">
                        <span class="material-symbols-outlined text-sm" data-icon="refresh">refresh</span> 刷新
                    </button>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div id="galleryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-8">
                <!-- Generated by JS -->
            </div>

            <!-- Stats & Pagination -->
            <div
                class="mt-20 flex flex-col md:flex-row items-center justify-between border-t border-outline-variant/20 pt-10">
                <div class="flex items-center gap-8 mb-6 md:mb-0">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-bold text-outline uppercase tracking-widest">体积统计</span>
                        <span id="galleryTotalSize" class="text-lg font-extrabold text-on-surface mt-1">计算中...</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] font-bold text-outline uppercase tracking-widest">活跃资产</span>
                        <span id="galleryTotalItems" class="text-lg font-extrabold text-on-surface mt-1">--</span>
                    </div>
                </div>
                <div class="flex items-center gap-2" id="paginationControls">
                    <!-- Gen by JS -->
                </div>
            </div>
        </div>

        <!-- ======================= SETTINGS VIEW ======================= -->
        <div id="view-settings" class="view-section hidden-view">
            <div class="mb-8 sm:mb-12">
                <span class="text-xs font-bold text-primary uppercase tracking-[0.2em] mb-2 block">配置</span>
                <h2 class="text-2xl sm:text-4xl font-extrabold font-headline text-on-surface tracking-tight mb-4">系统设置</h2>
                <p class="text-on-surface-variant max-w-2xl leading-relaxed text-sm sm:text-base">管理您的图片托管后端。只有管理员可修改系统存储配置。</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <div class="lg:col-span-4">
                    <div class="space-y-4" id="providerList">
                        <label
                            class="text-xs font-bold text-on-surface-variant uppercase tracking-widest block mb-6">可用后端配置</label>
                        <!-- Gen by JS -->
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="bg-surface-container-lowest rounded-2xl p-4 sm:p-8 space-y-6 sm:space-y-10">
                        <section>
                            <div class="flex items-center justify-between mb-8">
                                <div>
                                    <h3 class="text-xl font-bold font-headline" id="providerFormTitle">编辑存储配置</h3>
                                </div>
                            </div>
                            <form id="providerForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <input type="hidden" id="providerId" />

                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-on-surface-variant uppercase ml-1">提供商标志记号
                                        (Key)</label>
                                    <input id="providerKey"
                                        class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary/40 transition-all"
                                        placeholder="例如 alist, s3" type="text" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-on-surface-variant uppercase ml-1">显示名称
                                        (Name)</label>
                                    <input id="providerName"
                                        class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary/40 transition-all"
                                        placeholder="例如 ALIST, 本地服务器" type="text" />
                                </div>

                                <div class="space-y-2 md:col-span-2">
                                    <label class="text-xs font-bold text-on-surface-variant uppercase ml-1">API 域名
                                        (Host/URL)</label>
                                    <input id="providerHost"
                                        class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary/40 transition-all"
                                        placeholder="http://xxxx:5244" type="text" />
                                </div>

                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-on-surface-variant uppercase ml-1">API
                                        Token</label>
                                    <div class="relative">
                                        <input id="providerToken"
                                            class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary/40 transition-all"
                                            placeholder="与用户名密码二选一" type="password" />
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 my-2">
                                    <div class="flex-1 h-px bg-outline-variant/30"></div>
                                    <span class="text-xs text-on-surface-variant">或者</span>
                                    <div class="flex-1 h-px bg-outline-variant/30"></div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-xs font-bold text-on-surface-variant uppercase ml-1">AList
                                            用户名</label>
                                        <input id="providerAlistUsername"
                                            class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary/40 transition-all"
                                            placeholder="AList登录用户名" type="text" />
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-xs font-bold text-on-surface-variant uppercase ml-1">AList
                                            密码</label>
                                        <input id="providerAlistPassword"
                                            class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary/40 transition-all"
                                            placeholder="AList登录密码" type="password" />
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-bold text-on-surface-variant uppercase ml-1">挂载路径/存储桶</label>
                                    <input id="providerMountPath"
                                        class="w-full bg-surface-container-high border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary/40 transition-all"
                                        placeholder="/图片" type="text" />
                                </div>
                            </form>
                        </section>

                        <div
                            class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-4 border-t border-outline-variant/20">
                            <button type="button" onclick="loadProviders()"
                                class="w-full sm:w-auto px-8 py-3 rounded-lg text-on-surface font-bold text-sm bg-surface-container-high hover:bg-surface-container-highest transition-colors active:scale-95">清除</button>
                            <button type="button" id="saveProviderBtn"
                                class="w-full sm:w-auto px-10 py-3 rounded-lg primary-gradient text-white font-bold text-sm shadow-lg shadow-primary/20 hover:shadow-primary/30 active:scale-95 transition-all">保存配置</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Global Javascript Logic -->
    <script>
        const API_BASE_URL = "<?php echo $API_BASE_URL; ?>";
        let CURRENT_PAGE = 1;

        const toggleSidebar = () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        };

        const closeSidebar = () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            if (!sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        };

        // --- Init & User Handlers ---
        window.addEventListener('DOMContentLoaded', () => {
            const userInfoStr = localStorage.getItem('user_info');
            if (userInfoStr) {
                try {
                    const user = JSON.parse(userInfoStr);
                    document.getElementById('userNameDisplay').innerText = user.username;
                    document.getElementById('userAvatar').innerText = user.username.charAt(0).toUpperCase();
                } catch (e) { }
            }

            document.getElementById('userProfileBtn').addEventListener('click', () => {
                if (confirm("确定要退出登录吗？")) {
                    localStorage.removeItem('auth_token');
                    localStorage.removeItem('user_info');
                    window.location.href = 'login.php';
                }
            });

            // Navigation
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    switchView(btn.getAttribute('data-target'));
                    closeSidebar();
                });
            });

            // Copy to clipboard
            document.querySelectorAll('.copy-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetId = btn.getAttribute('data-target');
                    const inputElem = document.getElementById(targetId);
                    inputElem.select();
                    document.execCommand('copy');

                    const originalHTML = btn.innerHTML;
                    btn.innerHTML = `<span class="material-symbols-outlined text-sm text-green-500">check</span>`;
                    setTimeout(() => btn.innerHTML = originalHTML, 1500);
                });
            });

            // Initial view
            switchView('view-upload');
        });

        const getAuthHeaders = () => {
            const token = localStorage.getItem('auth_token');
            return {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            };
        };

        const switchView = (targetId) => {
            document.querySelectorAll('.view-section').forEach(section => {
                section.classList.add('hidden-view');
            });
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('text-blue-600', 'border-r-2', 'border-blue-600', 'bg-slate-200/50');
                btn.classList.add('text-slate-500');
            });

            document.getElementById(targetId).classList.remove('hidden-view');

            const activeNav = document.querySelector(`[data-target='${targetId}']`);
            if (activeNav) {
                activeNav.classList.remove('text-slate-500');
                activeNav.classList.add('text-blue-600', 'border-r-2', 'border-blue-600', 'bg-slate-200/50');
            }

            // Execute specific logic when a view opens
            if (targetId === 'view-gallery') fetchGallery(1);
            if (targetId === 'view-settings') loadProviders();
        };

        // --- UPLOAD LOGIC ---
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('fileInput');

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('border-primary');
        });
        dropzone.addEventListener('dragleave', () => dropzone.classList.remove('border-primary'));
        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('border-primary');
            if (e.dataTransfer.files.length) uploadFiles(e.dataTransfer.files);
        });
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length) uploadFiles(e.target.files);
        });

        const uploadFiles = async (files) => {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const queueId = 'ul_' + Date.now() + i;

                // Add UI to queue
                const queueHtml = `
                <div id="${queueId}" class="bg-surface-container-lowest p-4 rounded-lg flex items-center gap-4 border border-outline-variant/30">
                    <div class="w-12 h-12 rounded bg-surface-container-highest flex items-center justify-center overflow-hidden">
                        <span class="material-symbols-outlined text-primary text-xl animate-spin">sync</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm font-bold truncate">${file.name}</span>
                            <span class="text-[10px] font-mono text-primary status-text">Uploading...</span>
                        </div>
                    </div>
                </div>`;
                document.getElementById('uploadQueue').insertAdjacentHTML('afterbegin', queueHtml);

                const formData = new FormData();
                formData.append('image', file);

                try {
                    const token = localStorage.getItem('auth_token');
                    const res = await fetch(`${API_BASE_URL}/upload`, {
                        method: 'POST',
                        headers: { 'Authorization': `Bearer ${token}` },
                        body: formData
                    });
                    const data = await res.json();
                    const el = document.getElementById(queueId);

                    if (res.ok && data.success) {
                        el.querySelector('.status-text').innerText = 'SUCCESS';
                        el.querySelector('.status-text').classList.replace('text-primary', 'text-green-600');
                        el.querySelector('span.animate-spin').innerText = 'check_circle';
                        el.querySelector('span.animate-spin').classList.replace('animate-spin', 'text-green-600');

                        const domain = window.location.origin;
                        const imgKey = data.image_key;
                        const fullUrl = `${domain}/img/${imgKey}`;

                        // Update Links in UI
                        document.getElementById('linkMarkdown').value = `![${file.name}](${fullUrl})`;
                        document.getElementById('linkHtml').value = `<img src="${fullUrl}" alt="${file.name}" />`;
                        document.getElementById('linkDirect').value = data.direct_url || fullUrl;

                        // Show preview
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById('uploadPreview').src = e.target.result;
                            document.getElementById('uploadPreview').classList.remove('hidden');
                            document.getElementById('uploadPreviewText').classList.add('hidden');
                        }
                        reader.readAsDataURL(file);

                    } else {
                        throw new Error(data.error || 'Failed');
                    }
                } catch (err) {
                    const el = document.getElementById(queueId);
                    el.querySelector('.status-text').innerText = 'FAILED';
                    el.querySelector('.status-text').classList.replace('text-primary', 'text-error');
                    el.querySelector('span.animate-spin').innerText = 'error';
                    el.querySelector('span.animate-spin').classList.replace('animate-spin', 'text-error');
                }
            }
        };


        // --- GALLERY LOGIC ---
        const fetchGallery = async (page = 1) => {
            CURRENT_PAGE = page;
            const res = await fetch(`${API_BASE_URL}/images?page=${page}&limit=12`, { headers: getAuthHeaders() });
            const data = await res.json();

            const grid = document.getElementById('galleryGrid');
            grid.innerHTML = '';

            if (data.data) {
                data.data.forEach(img => {
                    const mB = (img.file_size / (1024 * 1024)).toFixed(2) + ' MB';
                    const domain = window.location.origin;
                    const fullUrl = `${domain}/img/${img.image_key}`;

                    grid.insertAdjacentHTML('beforeend', `
                    <div class="group relative bg-surface-container-low rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="aspect-[4/3] overflow-hidden relative cursor-pointer" onclick="window.open('${fullUrl}', '_blank')">
                            <img src="${fullUrl}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                            <div class="absolute bottom-3 right-3 px-2 py-1 bg-black/40 backdrop-blur rounded text-[10px] text-white font-mono uppercase">${img.mime_type.split('/').pop()}</div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-on-surface truncate mb-1" title="${img.original_name}">${img.original_name}</h3>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-[10px] font-bold text-on-surface-variant bg-surface-variant px-2 py-0.5 rounded tracking-tighter">${mB}</span>
                                <button onclick="deleteImage(${img.id})" class="text-error hover:scale-110 transition-transform">
                                    <span class="material-symbols-outlined text-sm">delete</span>
                                </button>
                            </div>
                        </div>
                    </div>`);
                });

                // Render pagination
                const pagination = document.getElementById('paginationControls');
                let pagesHtml = '';
                for (let i = 1; i <= data.pages; i++) {
                    const activeClass = (i === page) ? 'bg-primary-container text-white' : 'hover:bg-surface-container-low';
                    pagesHtml += `<button onclick="fetchGallery(${i})" class="px-3 h-8 rounded-lg text-xs font-bold transition-all ${activeClass}">${i}</button>`;
                }
                pagination.innerHTML = pagesHtml;
            }

            // Fetch Stats
            const statRes = await fetch(`${API_BASE_URL}/stats`, { headers: getAuthHeaders() });
            const sData = await statRes.json();
            if (statRes.ok) {
                document.getElementById('galleryTotalItems').innerText = sData.total_images || 0;
                document.getElementById('galleryTotalSize').innerText = sData.total_size ? (sData.total_size / (1024 * 1024)).toFixed(2) + ' MB' : '0 MB';
            }
        };

        const deleteImage = async (id) => {
            if (!confirm('确定删除此图片吗？（后端会执行逻辑删除）')) return;
            const res = await fetch(`${API_BASE_URL}/images/${id}`, {
                method: 'DELETE',
                headers: getAuthHeaders()
            });
            if (res.ok) fetchGallery(CURRENT_PAGE);
            else alert('删除失败。');
        };

        // --- SETTINGS LOGIC ---
        const loadProviders = async () => {
            document.getElementById('providerForm').reset();
            document.getElementById('providerId').value = '';

            const res = await fetch(`${API_BASE_URL}/providers`, { headers: getAuthHeaders() });
            const data = await res.json();

            const list = document.getElementById('providerList');
            // Retain the label header
            list.innerHTML = `<label class="text-xs font-bold text-on-surface-variant uppercase tracking-widest block mb-6">可用后端配置 (点击编辑)</label>`;

            if (data.data) {
                data.data.forEach(p => {
                    const isActive = p.status === 1;
                    const borderCls = isActive ? 'border-r-4 border-primary bg-surface-container-lowest shadow-sm' : 'bg-surface-container-low hover:bg-surface-container-lowest opacity-70 hover:opacity-100';
                    const icon = p.provider_key.includes('s3') ? 'cloud' : (p.provider_key.includes('alist') ? 'hard_drive' : 'database');

                    const el = document.createElement('div');
                    el.className = `group cursor-pointer p-5 rounded-xl transition-all ${borderCls} mb-3`;
                    el.innerHTML = `
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-slate-200 flex items-center justify-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-3xl">${icon}</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-on-surface font-headline">${p.provider_name}</h4>
                                <p class="text-xs text-on-surface-variant font-medium">${p.provider_key}</p>
                            </div>
                            ${isActive ? '<span class="material-symbols-outlined ml-auto text-primary" style="font-variation-settings:\'FILL\' 1;">check_circle</span>' : ''}
                        </div>
                    `;
                    el.addEventListener('click', () => {
                        document.getElementById('providerId').value = p.id;
                        document.getElementById('providerKey').value = p.provider_key;
                        document.getElementById('providerName').value = p.provider_name;
                        document.getElementById('providerHost').value = p.api_host;
                        document.getElementById('providerToken').value = p.api_token || '';
                        document.getElementById('providerAlistUsername').value = p.alist_username || '';
                        document.getElementById('providerAlistPassword').value = '';
                        document.getElementById('providerMountPath').value = p.mount_path;
                        document.getElementById('providerFormTitle').innerText = '修改配置 ' + p.provider_name;
                    });
                    list.appendChild(el);
                });
            }
        };

        document.getElementById('saveProviderBtn').addEventListener('click', async () => {
            const id = document.getElementById('providerId').value;
            const payload = {
                provider_key: document.getElementById('providerKey').value,
                provider_name: document.getElementById('providerName').value,
                api_host: document.getElementById('providerHost').value,
                api_token: document.getElementById('providerToken').value,
                alist_username: document.getElementById('providerAlistUsername').value,
                alist_password: document.getElementById('providerAlistPassword').value,
                mount_path: document.getElementById('providerMountPath').value,
            };

            const url = id ? `${API_BASE_URL}/providers/${id}` : `${API_BASE_URL}/providers`;
            const method = id ? 'PUT' : 'POST';

            const res = await fetch(url, {
                method: method,
                headers: getAuthHeaders(),
                body: JSON.stringify(payload)
            });

            if (res.ok) {
                alert('保存成功');
                loadProviders();
            } else {
                alert('保存失败。可能是参数不完整');
            }
        });

    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <title>防红链接生成器</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="color-scheme" content="light dark">
  <link rel="icon" href="https://cdn.jsdelivr.net/gh/haodai888/static@main/favicon/link.ico" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#2563eb',
            secondary: '#10b981',
            warning: '#f59e0b',
            dark: '#1e293b',
            light: '#f8fafc'
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', 'sans-serif'],
          },
        },
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
      .card-shadow {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.06), 0 4px 6px -4px rgba(59, 130, 246, 0.08);
      }
      .card-shadow-hover {
        box-shadow: 0 20px 40px -5px rgba(59, 130, 246, 0.13), 0 8px 10px -6px rgba(59, 130, 246, 0.08);
      }
      .btn-gradient {
        background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
      }
      .btn-gradient-secondary {
        background: linear-gradient(90deg, #10b981 0%, #34d399 100%);
      }
      .glow {
        box-shadow: 0 0 0 2px #3b82f6, 0 0 8px 2px #3b82f6;
      }
      .animate-fadeIn {
        animation: fadeIn .55s;
      }
      @keyframes fadeIn {
        from { opacity: 0;transform:translateY(10px);}
        to { opacity: 1;transform:translateY(0);}
      }
    }
    .color-radio:checked + label {
      border-width: 3px;
      border-color: #2563eb;
      box-shadow: 0 0 0 2px #3b82f6;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen flex items-center justify-center px-2 py-6 font-sans text-dark">
  <div class="container max-w-md w-full bg-white/90 rounded-3xl card-shadow transition-all duration-300 hover:card-shadow-hover overflow-hidden backdrop-blur-2xl">
    <!-- 顶部装饰 -->
    <div class="h-1 bg-gradient-to-r from-primary to-blue-400"></div>

    <!-- Logo与标题 -->
    <div class="flex justify-center mt-5">
      <div class="w-14 h-14 flex items-center justify-center rounded-full bg-primary shadow-lg text-white text-2xl glow">
        <i class="fa fa-link"></i>
      </div>
    </div>
    <div class="text-center pt-2 pb-1 px-5">
      <h1 class="text-2xl md:text-2xl font-extrabold text-primary drop-shadow-sm tracking-wide mb-2">防红链接生成器</h1>
      <div id="nowTime" class="text-center text-primary font-bold text-sm mb-2"></div>
      <p class="text-gray-500 text-sm mb-2">安全转换 · 稳定防红 · 免费使用</p>

      <!-- 炫彩字幕及扫码微信按钮 -->
      <div class="w-full rounded-lg mt-2 mb-3 px-2 py-2 bg-gradient-to-r from-pink-300 via-purple-300 to-blue-300 shadow-lg overflow-hidden">
        <div class="marquee font-bold text-base sm:text-lg bg-clip-text text-transparent bg-gradient-to-r from-red-500 via-yellow-400 via-green-400 via-blue-400 via-purple-500 to-pink-500 animate-gradient">
          搭建同款防红链接系统扫码添加微信
        </div>
      </div>
      <div class="flex flex-col items-center mb-2">
        <button onclick="showTopWechat()" class="font-semibold text-xs text-primary mb-1 underline hover:text-blue-600 transition-all">扫码添加微信</button>
      </div>
      <!-- 顶部弹窗二维码 -->
      <div id="topWechatModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center">
        <div class="bg-white p-4 rounded-2xl shadow-lg max-w-xs w-full relative animate-fadeIn">
          <span class="absolute top-2 right-2 text-gray-400 cursor-pointer text-xl font-bold" onclick="closeTopWechat()">&times;</span>
          <img src="http://fh.haodai.xyz/haodai888.jpg" alt="微信二维码" class="w-full rounded-xl mb-2">
          <div class="text-sm text-gray-700 text-center">扫一扫上面的二维码图案，联系搭建/咨询！</div>
        </div>
      </div>
      <style>
      @keyframes gradientMove {
        0% { background-position: 0% 50%;}
        100% { background-position: 100% 50%;}
      }
      .animate-gradient {
        background-size: 200% 200%;
        animation: gradientMove 3s linear infinite;
      }
      .marquee {
        white-space: nowrap;
        overflow: hidden;
        animation: marqueeMove 8s linear infinite;
        will-change: transform;
      }
      @keyframes marqueeMove {
        0% { transform: translateX(100%);}
        100% { transform: translateX(-100%);}
      }
      </style>
    </div>

    <!-- 注意事项 -->
    <div class="p-3 bg-yellow-50 border-l-4 border-yellow-400 mx-3 mb-3 rounded shadow-sm flex items-start">
      <span class="mt-0.5 text-yellow-500 text-lg"><i class="fa fa-exclamation-triangle"></i></span>
      <span class="ml-2 text-yellow-800 text-xs">请输入以 <span class="font-semibold">https://</span> 开头的网址（仅支持HTTPS协议）</span>
    </div>

    <!-- 输入区域 -->
    <div class="p-4 pt-2 mx-3">
      <label for="targetUrl" class="block text-gray-700 font-medium mb-2 text-sm">
        <i class="fa fa-globe mr-1"></i> 目标网址
      </label>
      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
          <i class="fa fa-link"></i>
        </span>
        <input 
          type="text" 
          id="targetUrl" 
          placeholder="https://需要防红的网址.com" 
          class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-200 text-sm bg-gray-50"
          autocomplete="off"
        >
      </div>

      <!-- 颜色选择器 -->
      <div class="mt-4">
        <span class="text-xs text-gray-700 font-medium mb-1 block">二维码颜色：</span>
        <div class="flex flex-wrap gap-2">
          <input type="radio" name="qrcolor" id="qrcolor1" class="hidden color-radio" value="#2563eb" checked>
          <label for="qrcolor1" class="w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center cursor-pointer" style="background:#2563eb"></label>
          <input type="radio" name="qrcolor" id="qrcolor2" class="hidden color-radio" value="#10b981">
          <label for="qrcolor2" class="w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center cursor-pointer" style="background:#10b981"></label>
          <input type="radio" name="qrcolor" id="qrcolor3" class="hidden color-radio" value="#ef4444">
          <label for="qrcolor3" class="w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center cursor-pointer" style="background:#ef4444"></label>
          <input type="radio" name="qrcolor" id="qrcolor4" class="hidden color-radio" value="#f59e0b">
          <label for="qrcolor4" class="w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center cursor-pointer" style="background:#f59e0b"></label>
          <input type="radio" name="qrcolor" id="qrcolor5" class="hidden color-radio" value="#000000">
          <label for="qrcolor5" class="w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center cursor-pointer" style="background:#000000"></label>
        </div>
      </div>

      <!-- 生成按钮 -->
      <button 
        class="btn-gradient w-full py-3 rounded-lg text-white font-semibold mt-4 shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 text-base"
        onclick="generate()"
        id="generateBtn"
      >
        <i class="fa fa-magic mr-2"></i> 生成防红链接
      </button>
    </div>

    <!-- 结果区域 -->
    <div id="result" class="hidden p-4 mx-3 mt-2 animate-fadeIn">
      <div class="bg-blue-50 border-l-4 border-primary p-4 rounded-lg mb-4">
        <div class="flex items-center justify-between mb-2">
          <span class="text-gray-700 font-semibold text-xs">防红链接</span>
          <span class="text-[10px] bg-primary/10 text-primary px-2 py-0.5 rounded-full">已防红</span>
        </div>
        <div id="output" class="text-sm text-blue-800 break-all select-all relative font-mono py-2 px-2 rounded bg-blue-100">
          <!-- 链接将在这里生成 -->
        </div>
        <button 
          class="btn-gradient-secondary w-full py-2.5 rounded-lg text-white font-medium mt-3 shadow hover:shadow-lg transition-all duration-300 text-base"
          onclick="copyResult()"
        >
          <i class="fa fa-clipboard mr-2"></i> 一键复制链接
        </button>
      </div>
      <!-- 二维码区域 -->
      <div class="text-center pt-2">
        <h3 class="text-gray-600 font-medium text-xs mb-2 tracking-wide">
          <i class="fa fa-qrcode mr-1"></i> 手机扫码访问
        </h3>
        <div id="qrcode" class="mx-auto p-3 bg-white rounded-lg shadow w-max"></div>
        <p class="text-xs text-gray-400 mt-2">长按二维码可保存图片</p>
      </div>
    </div>

    <!-- 页脚 -->
    <div class="p-4 mt-4 border-t border-gray-100 text-center text-xs text-gray-400">
      <p>
        搭建同款 | <span class="text-primary cursor-pointer underline" onclick="showWechat()">微信扫码咨询</span>
      </p>
      <div id="wechatModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center">
        <div class="bg-white p-4 rounded-2xl shadow-lg max-w-xs w-full relative animate-fadeIn">
          <span class="absolute top-2 right-2 text-gray-400 cursor-pointer text-xl font-bold" onclick="closeWechat()">&times;</span>
          <img src="http://fh.haodai.xyz/haodai888.jpg" alt="微信二维码" class="w-full rounded-xl mb-2">
          <div class="text-sm text-gray-700 text-center">扫一扫上面的二维码图案，联系搭建/咨询！</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast 提示 -->
  <div id="toast" class="fixed bottom-8 left-1/2 transform -translate-x-1/2 px-4 py-2 rounded-lg shadow-lg z-50 hidden text-white font-medium text-sm"></div>

  <script>
    // 实时更新时间
    function updateNowTime() {
      var now = new Date();
      var y = now.getFullYear();
      var m = String(now.getMonth()+1).padStart(2,'0');
      var d = String(now.getDate()).padStart(2,'0');
      var h = String(now.getHours()).padStart(2,'0');
      var mi = String(now.getMinutes()).padStart(2,'0');
      var s = String(now.getSeconds()).padStart(2,'0');
      var str = y+'年'+m+'月'+d+'日 '+h+'时'+mi+'分'+s+'秒';
      document.getElementById('nowTime').innerText = str;
    }
    setInterval(updateNowTime, 1000);
    updateNowTime();

    // Base64编码函数
    function base64Encode(str) {
      return btoa(unescape(encodeURIComponent(str)));
    }

    // 生成防红链接（动态从api获取主域名）
    async function generate() {
      var url = document.getElementById('targetUrl').value.trim();
      var btn = document.getElementById('generateBtn');
      var qrcolor = document.querySelector('input[name="qrcolor"]:checked').value || "#2563eb";
      if (!url) {
        showToast('请输入目标网址！', 'error');
        return;
      }
      if (!/^https:\/\//i.test(url)) {
        showToast('仅支持以 https:// 开头的链接！', 'error');
        return;
      }

      btn.disabled = true;
      btn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> 生成中...';

      try {
        // 1. 获取API里的主域名
        const resp = await fetch('https://api.haodai.xyz/api.php');
        const domain = (await resp.text()).trim();

        // 2. 生成防红链接
        var encodedUrl = base64Encode(url);
        var resultUrl = `https://${domain}?c=${encodedUrl}`;
        document.getElementById('output').textContent = resultUrl;
        document.getElementById('result').classList.remove('hidden');
        // 生成二维码
        var qrcodeDiv = document.getElementById('qrcode');
        qrcodeDiv.innerHTML = "";
        new QRCode(qrcodeDiv, {
          text: resultUrl,
          width: Math.min(180, window.innerWidth * 0.65),
          height: Math.min(180, window.innerWidth * 0.65),
          colorDark: qrcolor,
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.H
        });

        btn.disabled = false;
        btn.innerHTML = '<i class="fa fa-magic mr-2"></i> 生成防红链接';
        showToast('防红链接生成成功！', 'success');
      } catch (e) {
        btn.disabled = false;
        btn.innerHTML = '<i class="fa fa-magic mr-2"></i> 生成防红链接';
        showToast('获取主域名失败！', 'error');
      }
    }

    // 复制结果到剪贴板
    function copyResult() {
      var text = document.getElementById('output').textContent;
      if (!text) {
        showToast('没有可复制的链接！', 'error');
        return;
      }
      if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => {
          showToast('链接已复制！', 'success');
        }).catch(err => {
          showToast('复制失败：' + err, 'error');
        });
      } else {
        var textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        try {
          document.execCommand('copy');
          showToast('链接已复制！', 'success');
        } catch (err) {
          showToast('复制失败，请手动复制', 'error');
        }
        document.body.removeChild(textarea);
      }
    }

    // Toast 提示
    function showToast(message, type = 'info') {
      var toast = document.getElementById('toast');
      toast.textContent = message;
      toast.className = 'fixed bottom-8 left-1/2 transform -translate-x-1/2 px-4 py-2 rounded-lg shadow-lg z-50 text-white font-medium text-sm animate-fadeIn';
      toast.style.background = type === 'success' ? '#10b981' : (type==='error' ? '#ef4444' : '#2563eb');
      toast.style.display = 'block';
      setTimeout(() => {
        toast.style.display = 'none';
      }, 2200);
    }

    // 微信弹窗
    function showWechat() {
      document.getElementById('wechatModal').classList.remove('hidden');
    }
    function closeWechat() {
      document.getElementById('wechatModal').classList.add('hidden');
    }
    // 顶部扫码弹窗
    function showTopWechat() {
      document.getElementById('topWechatModal').classList.remove('hidden');
    }
    function closeTopWechat() {
      document.getElementById('topWechatModal').classList.add('hidden');
    }
  </script>

  <!-- 网站访问统计代码 -->
  <script type="text/javascript" src="https://js.users.51.la/21969247.js"></script>
</body>
</html>

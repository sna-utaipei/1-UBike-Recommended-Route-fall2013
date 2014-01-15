//利用canvas產生一個內含文字的圖檔
function createMarkerIcon(text, opt) {
    //定義預設參數
    var defaultOptions = {
        fontStyle: "normal", //normal, bold, italic
        fontName: "Arial",
        fontSize: 12, //以Pixel為單位
        bgColor: "darkblue",
        fgColor: "white",
        padding: 4,
        arrowHeight: 6 //下方尖角高度
    };
    options = $.extend(defaultOptions, opt);
    //建立Canvas，開始幹活兒
    var canvas = document.createElement("canvas"),
                    context = canvas.getContext("2d");
    //評估文字尺寸
    var font = options.fontStyle + " " + options.fontSize + "px " +
                           options.fontName;
    context.font = font;
    var metrics = context.measureText(text);
    //文字大小加上padding作為外部尺寸
    var w = metrics.width + options.padding * 2;
    //高度以Font的大小為準
    var h = options.fontSize + options.padding * 2 +
                        options.arrowHeight;
    canvas.width = w;
    canvas.height = h;
    //邊框及背景
    context.beginPath();
    context.rect(0, 0, w, h - options.arrowHeight);
    context.fillStyle = options.bgColor;
    context.fill();
    //畫出下方尖角
    context.beginPath();
    var x = w / 2, y = h, arwSz = options.arrowHeight;
    context.moveTo(x, y);
    context.lineTo(x - arwSz, y - arwSz);
    context.lineTo(x + arwSz, y - arwSz);
    context.lineTo(x, y);
    context.fill();
    //印出文字
    context.textAlign = "center";
    context.fillStyle = options.fgColor;
    context.font = font;
    context.fillText(text,
                    w / 2,
                    (h - options.arrowHeight) / 2 + options.padding);
    //傳回DataURI字串
    return canvas.toDataURL();
}
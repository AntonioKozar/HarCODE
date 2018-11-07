importScripts('ocr.js')
onmessage = function (e) {
    postMessage(OCRAD(e.data))
}
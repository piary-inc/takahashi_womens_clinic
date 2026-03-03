import Alpine from 'alpinejs'
import '../css/app.css'

window.Alpine = Alpine

Alpine.start()

// jQueryはWordPress同梱のものを使用
// グローバルの $ / jQuery が利用可能
jQuery(function ($) {
  $(".test").on("click", function () {
    alert("jQueryテスト: .testがクリックされました")
  })
})
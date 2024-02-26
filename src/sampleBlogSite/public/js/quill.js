// quillテキストエディタを生成する
var quill = new Quill('#quill-editor', {
  theme: 'snow'
});

$('#subbtn').click(function () {
  // Quillのデータをinputに代入
  document.querySelector('input[name=content]').value = document.querySelector('.ql-editor').innerHTML;
  // 送信
  document.createform.submit();
})
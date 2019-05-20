<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Create the editor container -->
<div class="div1">
  <div class="editor">
    <p>Hello World!</p>
    <p>Some initial <strong>bold</strong> text</p>
    <p><br></p>
  </div>
</div>

<div class="div2">
  <div class="editor">
    <p>Div 2</p>
    <p>Some initial <strong>bold</strong> text</p>
    <p><br></p>
  </div>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('.editor', {
    theme: 'snow'
  });
</script>

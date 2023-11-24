@include('frames::monaco-editor.functions.ffMonacoEditorTheme')
@include('frames::monaco-editor.javascript.init')

<script>
   
    let theme = {!! ffMonacoEditorTheme($background) !!};
    window.language = '{{ Request::get("language") ?? "plaintext" }}';
    window.editor = null;
    window.initialValue = '';
    window.initialLanguage = language;

    const PLACEHOLDER = document.getElementById('editor-placeholder');
    const IFRAME = (typeof window.frameElement !== 'undefined') ? window.frameElement : null;
    const IFRAME_ID = (IFRAME) ? window.frameElement.id : null;
    const LOADER = document.getElementById('loader');
    const CONTENT = document.getElementById('content');

    // window.callBootMethod = function(){}
    // window.addEventListener('boot', callBootMethod);

    require(["vs/editor/editor.main"], function() {
        
        editor = monaco.editor.create(document.getElementById('editor'), {
            value: initialValue,
            theme: 'vs-dark',
            fontSize: "15px",
            lineNumbersMinChars: 3,
            automaticLayout: true,
            language: initialLanguage,
            minimap: { enabled: false },
        });


        monaco.editor.defineTheme('blackboard', theme);
        monaco.editor.setTheme('blackboard');

        // onchanged events here
        editor.onDidChangeModelContent(e => {
            window.dispatchEvent(new CustomEvent('updated', { detail: { value: editor.getValue() }}));
            updatePlaceholder(editor.getValue());
        });

        // when the editor is blurred
        editor.onDidBlurEditorText(()=>{
            window.dispatchEvent(new CustomEvent('blurred'));
            //window.livewire.emit('codeUpdated', { code: editor.getValue() });
        });

        editor.onDidBlurEditorWidget(() => {
            updatePlaceholder(editor.getValue());
        });

        editor.onDidFocusEditorWidget(() => {
            updatePlaceholder(editor.getValue());
        });

        ready();

    });
    

    window.changeLanguage = function(lang){
        monaco.editor.setModelLanguage(editor.getModel(), lang);
    }

    window.set = function(code){
        editor.getModel().setValue( code );
    }

    window.get = function(){
        return editor.getValue();
    }

    window.updatePlaceholder = function(value) {
        if (value === "") {
            PLACEHOLDER.style.display = "block";
        } else {
            PLACEHOLDER.style.display = "none";
        }
    }

    // Event listeners
    PLACEHOLDER.addEventListener('click', function(){
        editor.focus();
    });

    window.ready = function(){
        LOADER.classList.add('opacity-0');
        setTimeout(function(){
            LOADER.remove();
        }, 1050);
        editor.getModel().setValue( window.initialValue );
        window.dispatchEvent(new CustomEvent('ready'));
    }

    window.frameFocused = function(){
        window.dispatchEvent(new CustomEvent('focused'));
    }
</script>
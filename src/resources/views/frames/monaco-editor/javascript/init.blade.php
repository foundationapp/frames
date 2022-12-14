<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script>
    // Based on https://jsfiddle.net/developit/bwgkr6uq/ which just works but is based on unpkg.com.
    // Provided by loader.min.js.
    require.config({
        paths: {
            'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs'
        }
    });

    let proxy = URL.createObjectURL(new Blob([`
        self.MonacoEnvironment = {
            baseUrl: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min'
        };
        importScripts('https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/base/worker/workerMain.min.js');
    `], {
        type: 'text/javascript'
    }));

    window.MonacoEnvironment = {
        getWorkerUrl: () => proxy
    };

</script>
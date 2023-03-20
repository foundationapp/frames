<script src="//unpkg.com/alpinejs" defer></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/github.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>

<style>
    pre code.hljs{
        padding:1.5rem;
    }
</style>

<div class="w-full px-10 py-5">
    <h1 class="text-xl font-bold flex items-center space-x-1.5">
        <span>Monaco Editor</span>
        <span class="bg-blue-500 font-medium rounded-full px-3 py-1 text-white text-xs">iframe component</span>
        <span class="font-medium">examples</span>
    </h1>
</div>

<div
    x-data="{
            languages: [
                'plaintext',
                'json',
                'abap',
                'apex',
                'azcli',
                'bat',
                'cameligo',
                'clojure',
                'coffeescript',
                'c',
                'cpp',
                'csharp',
                'csp',
                'css',
                'dockerfile',
                'fsharp',
                'go',
                'graphql',
                'handlebars',
                'html',
                'ini',
                'java',
                'javascript',
                'kotlin',
                'less',
                'lua',
                'markdown',
                'mips',
                'msdax',
                'mysql',
                'objective-c',
                'pascal',
                'pascaligo',
                'perl',
                'pgsql',
                'php',
                'postiats',
                'powerquery',
                'powershell',
                'pug',
                'python',
                'r',
                'razor',
                'redis',
                'redshift',
                'restructuredtext',
                'ruby',
                'rust',
                'sb',
                'scheme',
                'scss',
                'shell',
                'sol',
                'aes',
                'sql',
                'st',
                'swift',
                'tcl',
                'twig',
                'typescript',
                'vb',
                'xml',
                'yaml'
            ]
        }"

 class="w-full relative border-b border-gray-200">
    
    <div x-data="{ language: 'javascript', init: function(){ this.language = 'javascript'; } }" class="grid group grid-cols-3 border-t border-gray-200">
        <div class="relative col-span-1 p-10 border-r border-gray-200 bg-gray-50 group-hover:bg-blue-50">
            <h2 class="text-lg font-bold mb-2">Basic Example</h2>
            <p class="text-gray-600">Here is a basic example of the code editor. You can inlude the editor with a single line of HTML 👇</p>
            <div class=" text-xs rounded-md overflow-hidden mt-3 border border-gray-100 shadow-sm">
                <pre><code class="language-html">&lt;iframe 
    id="example-01" 
    src="{{ route('frames-monaco-editor') }}?language=javascript"&gt;
&lt;/iframe&gt;</code></pre>
            </div>
        </div>
        <div class="p-10 col-span-2">
            <div class="w-full flex rounded-t-md bg-gray-900 space-x-2 w-full flex items-center px-3 py-2 text-sm">
                <select x-model="language" class="px-3 py-1 rounded bg-gray-700 text-gray-100">
                    <template x-for="lang in languages">
                        <option :value="lang" x-text="lang" :selected="lang == language"></option>
                    </template>
                </select>
                <div class="px-3 py-1 text-gray-100 border w-full border-gray-600 rounded"><p class="font-mono">{{ route('frames-monaco-editor') }}?language=<span x-text="language"></span></p></div>
            </div>
            <iframe id="example-01" class="w-full min-h-[300px] rounded-b-md" border="0" style="background: #{{ $background }}" :src="'{{ route('frames-monaco-editor') }}?language=' + language"></iframe>
        </div>
    </div>


    <div x-data="{  
        runCode: function(){
            let codeEditor = document.getElementById('example-02').contentWindow;       
            codeEditor.set('let awesome = true;');
        }
     }" class="group grid grid-cols-3 border-t border-gray-200">
        <div class="relative col-span-1 p-10 border-r border-gray-200 bg-gray-50 group-hover:bg-blue-50">
            <h2 class="text-lg font-bold mb-2">Set Code Example</h2>
            <p class="text-gray-600">Here is a quick example of how to set the code inside the editor. Click the <strong>Run Code</strong> button below to see it in action 🪄</p>
            <div class=" text-xs rounded-md overflow-hidden mt-3 border border-gray-100 shadow-sm">
                <pre><code class="language-javascript">let codeEditor = document.getElementById('example-02').contentWindow;
                    
codeEditor.set('let awesome = true;');</code></pre>
            </div>
            <div class="flex justify-end mt-2">
                <button x-on:click="runCode()" class="px-4 py-2 rounded-md text-white bg-blue-500">Run Code</button>
            </div>
        </div>
        <div class="p-10 col-span-2 rounded-md overflow-hidden">
            
            <iframe id="example-02" class="w-full min-h-[300px] rounded-md" border="0" style="background: #{{ $background }}" src="{{ route('frames-monaco-editor') }}?language=javascript"></iframe>
        </div>
    </div>

    <div x-data="{  
        init: function(){
            let codeEditor = document.getElementById('example-03').contentWindow;      
            codeEditor.addEventListener('ready', function(event){
                codeEditor.set(`let message = 'Hello World'`);
            });
        }
     }" class="group grid grid-cols-3 border-t border-gray-200">
        <div class="relative col-span-1 p-10 border-r border-gray-200 bg-gray-50 group-hover:bg-blue-50">
            <h2 class="text-lg font-bold mb-2">Set Code When Page Loads Example</h2>
            <p class="text-gray-600">Easily set the value when the page Loads and the editor is ready 🤙</p>
            <div class=" text-xs rounded-md overflow-hidden mt-3 border border-gray-100 shadow-sm">
                <pre><code class="language-javascript">let codeEditor = document.getElementById('example-03').contentWindow;

codeEditor.addEventListener('ready', function(event){
    codeEditor.set(`let message = 'Hello World'`);
});</code></pre>
            </div>
        </div>
        <div class="p-10 col-span-2 rounded-md overflow-hidden">
            <iframe id="example-03" class="w-full overflow-hidden min-h-[300px] rounded-md" border="0" style="background: #{{ $background }}" src="{{ route('frames-monaco-editor') }}?language=javascript"></iframe>
        </div>
    </div>


    <div x-data="{  
        init: function(){
            let codeEditor = document.getElementById('example-04').contentWindow;      
            codeEditor.addEventListener('ready', function(event){
                codeEditor.set(`for(let i=0; i<10; i++)
{
    console.log(i);
}`);
            });
        },
        runCode: function(){
            let codeEditor = document.getElementById('example-04').contentWindow;       
            alert(codeEditor.get());
        }
     }" class="group grid grid-cols-3 border-t border-gray-200">
        <div class="relative col-span-1 p-10 border-r border-gray-200 bg-gray-50 group-hover:bg-blue-50">
            <h2 class="text-lg font-bold mb-2">Get Code Example</h2>
            <p class="text-gray-600">Here is a quick example of how to set the code inside the editor. Click the <strong>Run Code</strong> button below to see it in action 🪄</p>
            <div class=" text-xs rounded-md overflow-hidden mt-3 border border-gray-100 shadow-sm">
                <pre><code class="language-javascript">let codeEditor = document.getElementById('example-04').contentWindow;

let code = codeEditor.get();

alert(code);</code></pre>
            </div>
            <div class="flex justify-end mt-2">
                <button x-on:click="runCode()" class="px-4 py-2 rounded-md text-white bg-blue-500">Run Code</button>
            </div>
        </div>
        <div class="p-10 col-span-2 rounded-md overflow-hidden">
            
            <iframe id="example-04" class="w-full min-h-[300px] rounded-md" border="0" style="background: #{{ $background }}" src="{{ route('frames-monaco-editor') }}?language=javascript"></iframe>
        </div>
    </div>

    <div x-data="{  
        init: function(){
            let codeEditor = document.getElementById('example-05').contentWindow;      
            codeEditor.addEventListener('ready', function(event){
                codeEditor.set(`let cool = true;

if(cool){
    console.log('Super Rad!');
}`);
            });
            codeEditor.addEventListener('updated', function(event){
                let code = event.detail.value;
                document.getElementById('output').innerText = code; 
            });
        }
     }" class="group grid grid-cols-3 border-t border-gray-200">
        <div class="relative col-span-1 p-10 border-r border-gray-200 bg-gray-50 group-hover:bg-blue-50">
            <h2 class="text-lg font-bold mb-2">Code Updated Event Listener Example</h2>
            <p class="text-gray-600">Update a textarea when the code is updated 👇</p>
            <div class=" text-xs rounded-md overflow-hidden mt-3 border border-gray-100 shadow-sm">
                <pre><code class="language-javascript">let codeEditor = document.getElementById('example-05').contentWindow;

codeEditor.addEventListener('updated', function(event){
    document.getElementById('output').innerText = event.detail.value; 
});</code></pre>
            </div>
        </div>
        <div class="p-10 col-span-2 rounded-md overflow-hidden">
            <iframe id="example-05" class="w-full overflow-hidden min-h-[300px] rounded-md" border="0" style="background: #{{ $background }}" src="{{ route('frames-monaco-editor') }}?language=javascript"></iframe>
            <div class="bg-gray-50 font-mono text-xs p-3 mt-3 rounded-md border border-gray-100 relative overflow-hidden">
                <div class="bg-gray-200 px-2 py-1 text-gray-600 rounded-br-lg text-[0.65rem] uppercase absolute top-0 left-0">Output</div>
                <div id="output" class="p-5 whitespace-pre"></div>
            </div>
        </div>
    </div>


    <div x-data="{  
        init: function(){
            let codeEditor = document.getElementById('example-06').contentWindow;      
            codeEditor.addEventListener('focused', function(event){
                console.log('we got focused'); 
            });
        }
     }" class="group grid grid-cols-3 border-t border-gray-200">
        <div class="relative col-span-1 p-10 border-r border-gray-200 bg-gray-50 group-hover:bg-blue-50">
            <h2 class="text-lg font-bold mb-2">Code Editor Focused</h2>
            <p class="text-gray-600">Focus Event 🧐</p>
            <div class=" text-xs rounded-md overflow-hidden mt-3 border border-gray-100 shadow-sm">
                <pre><code class="language-javascript">let codeEditor = document.getElementById('example-06').contentWindow;      

codeEditor.addEventListener('focused', function(event){
    console.log('we got focused'); 
});</code></pre>
            </div>
        </div>
        <div class="p-10 col-span-2 rounded-md overflow-hidden">
            <iframe id="example-06" class="w-full overflow-hidden min-h-[300px] rounded-md" border="0" style="background: #{{ $background }}" src="{{ route('frames-monaco-editor') }}?language=javascript"></iframe>
        </div>
    </div>


    <div x-data="{  
        init: function(){
            let codeEditor = document.getElementById('example-07').contentWindow;      
            codeEditor.addEventListener('blurred', function(event){
                console.log('we lost focus'); 
            });
        }
     }" class="group grid grid-cols-3 border-t border-gray-200">
        <div class="relative col-span-1 p-10 border-r border-gray-200 bg-gray-50 group-hover:bg-blue-50">
            <h2 class="text-lg font-bold mb-2">Code Editor Blurred</h2>
            <p class="text-gray-600">Blur Event 🙈</p>
            <div class=" text-xs rounded-md overflow-hidden mt-3 border border-gray-100 shadow-sm">
                <pre><code class="language-javascript">let codeEditor = document.getElementById('example-06').contentWindow;      

codeEditor.addEventListener('blurred', function(event){
    console.log('we lost focus'); 
});</code></pre>
            </div>
        </div>
        <div class="p-10 col-span-2 rounded-md overflow-hidden">
            <iframe id="example-07" class="w-full overflow-hidden min-h-[300px] rounded-md" border="0" style="background: #{{ $background }}" src="{{ route('frames-monaco-editor') }}?language=javascript"></iframe>
        </div>
    </div>

</div>
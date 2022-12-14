<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevDojo Code Editor</title>
    <style>
        body,html{
            height:100vh;
            width:100%;
        }

        @if(!Request::get('examples'))
            body, html{
                background:#0c1021;
            }
        @endif

        .monaco-editor, #editor-placeholder {
            padding-top: {{ Request::get("paddingTop") ?? "12px"; }}
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body @if(!Request::get('examples')) onfocus="frameFocused()" @endif>

    @if(Request::get('examples'))
        {{-- If we set ?examples=true we can see some examples of the editor --}}
        @include('frames::monaco-editor.examples');
    @else
        <div id="loader" class="w-full z-20 ease-out duration-1000 h-full fixed inset-0 bg-[#0c1021] flex items-center justify-center">
            <svg class="animate-spin h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
        </div>

        <div id="content" class="w-full z-10 h-full relative">
            <div id="editor" wire:ignore class="w-full h-full text-lg"></div>
            <div id="editor-placeholder" class="w-full text-sm font-mono absolute z-50 text-gray-500 ml-14 -translate-x-0.5 mt-0.5 left-0 top-0">Start typing here</div>
        </div>
        @include('frames::monaco-editor.javascript.main')

    @endif

</body>
</html>

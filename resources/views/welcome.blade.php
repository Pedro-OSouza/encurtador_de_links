<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurtador de Links</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>
<body>
    <div class="container">
        <h1>Encurtador de Links</h1>
        <p class="subtitle">Cole seus links longos e gere URLs curtas em segundos.</p>

        @if (session('short_url'))
            <div class="result-card">
                <div class="result-title">Seu link encurtado está pronto:</div>
                <div class="result-wrapper">
                    <a href="{{ session('short_url') }}" target="_blank" class="result-link" id="shortUrl">
                        {{ session('short_url') }}
                    </a>
                    <button type="button" class="btn-copy" onclick="copyLink()">Copiar</button>
                </div>
            </div>
        @endif

        <form action="{{ route('url.shorten') }}" method="POST">
            @csrf
            <div class="input-group">
                <input 
                    type="url" 
                    name="original_url" 
                    placeholder="https://seu-link-super-longo.com/..." 
                    required 
                />
                @error("original_url")
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn-submit">Encurtar Link</button>
        </form>
    </div>

    <script>
        function copyLink() {
            const linkText = document.getElementById('shortUrl').innerText.trim();
            navigator.clipboard.writeText(linkText).then(() => {
                const btn = document.querySelector('.btn-copy');
                btn.innerText = 'Copiado!';
                btn.style.backgroundColor = '#86efac';
                
                setTimeout(() => {
                    btn.innerText = 'Copiar';
                    btn.style.backgroundColor = '#dcfce7';
                }, 2000);
            });
        }
    </script>
</body>
</html>
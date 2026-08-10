<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceso | INDI</title>
    <link rel="stylesheet" href="https://use.typekit.net/iyv7knh.css">
    <style>
        :root { --blue: #0066f9; --ink: #101010; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; background: #f2f2f2; color: var(--ink); font-family: usual, Arial, sans-serif; }
        .access-shell { width: min(92vw, 520px); padding: 3rem; background: #fff; box-shadow: 0 24px 70px rgba(0,0,0,.12); }
        .brand { display: block; width: 130px; margin: 0 auto 3rem; }
        .eyebrow { margin: 0 0 .75rem; color: var(--blue); font-size: .75rem; font-weight: 700; letter-spacing: .2em; text-align: center; }
        h1 { margin: 0 0 2rem; font-size: clamp(2rem, 6vw, 3rem); line-height: .95; text-align: center; }
        label { display: block; margin-bottom: .6rem; font-size: .8rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        input { width: 100%; padding: 1rem; border: 1px solid #d7dbe2; background: #fafafa; font: inherit; }
        input:focus { outline: 2px solid var(--blue); outline-offset: 2px; }
        button { width: 100%; margin-top: 1.25rem; padding: 1rem; border: 0; background: var(--blue); color: #fff; font: inherit; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; cursor: pointer; }
        .error { margin: 0 0 1.25rem; padding: .85rem 1rem; background: #fff0f0; color: #b42318; font-size: .9rem; }
        @media (max-width: 520px) { .access-shell { padding: 2rem 1.4rem; } .brand { margin-bottom: 2rem; } }
    </style>
</head>
<body>
    <main class="access-shell">
        <img class="brand" src="{{ asset('assets/indi brand-01.svg') }}" alt="INDI">
        <p class="eyebrow">ACCESO GENERAL</p>
        <h1>GRUPO INDI</h1>
        @if($errors->any())
            <p class="error">{{ $errors->first('password') }}</p>
        @endif
        <form method="POST" action="{{ route('site.access.submit') }}">
            @csrf
            <label for="password">Contraseña</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required autofocus>
            <button type="submit">Entrar al sitio</button>
        </form>
    </main>
</body>
</html>

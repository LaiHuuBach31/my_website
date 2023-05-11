<div style="padding: 15px; width: 350px; margin: auto; background: #f1cbe0">
    <h2>Hi: {{$name}}</h2>
    <p>
        Please click the button below to verify your account, if after a period of time you do not confirm, the system will remove your account, you have to re-register from where
    </p>

    <a href="{{ route('index.verify_account', $token) }}" style="
        display: inline-block;
        padding: 15px 25px;
        background: green;
        color: #fff;
        font-weight: bold
    ">Vefiry your account</a>
</div>
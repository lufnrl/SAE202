<div id="banner" class="banner">
    <div class="banner_title">
        <span>Cookies🍪</span>
    </div>
    <div class="banner_content">
        <p>Nous utilisons des cookies pour vous offrir la meilleure expérience sur notre site Web. En poursuivant votre navigation sur le site, vous acceptez notre utilisation des cookies.</p>
    </div>
    <div class="lstbutton">
        <ul class="ul">
            <li class="li1">
                <form action="">
                    <button id="accept" class="btn_accept">Accepter</button>
                </form>
            </li>
            <li class="li2">
                <form action="">
                    <button id="refuse" class="btn_refuse">Refuser</button>
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Vérifier si le consentement a déjà été accepté
        if (localStorage.getItem('cookie_consent') === 'accepted') {
            document.getElementById('banner').style.display = 'none';
        } else {
            document.getElementById('banner').style.display = 'block';
        }

        // Ajouter un écouteur sur le bouton "Refuser"
        document.getElementById('refuse').addEventListener('click', function (event) {
            event.preventDefault(); // Empêcher le comportement par défaut du formulaire
            localStorage.setItem('cookie_consent', 'refused');
            document.getElementById('banner').style.display = 'none'; // Cacher la bannière après refus
        });

        // Ajouter un écouteur sur le bouton "Accepter"
        document.getElementById('accept').addEventListener('click', function (event) {
            event.preventDefault(); // Empêcher le comportement par défaut du formulaire
            localStorage.setItem('cookie_consent', 'accepted');
            document.getElementById('banner').style.display = 'none'; // Cacher la bannière après acceptation
        });
    });
</script>

<style>
    .banner {
        font-family: "Inter", sans-serif;
        position: fixed;
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        height: auto;
        width: 300px;
        left: 0;
        bottom: 0;
        z-index: 9999;
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .banner_title {
        width: auto;
        height: 20px;
        text-align: center;
    }

    .banner_title span {
        font-size: 20px;
        color: #1a1a1a;
        text-align: center;
        font-weight: 500;
    }

    .banner_content {
        padding: 20px 0;
    }

    p {
        font-size: 16px;
    }

    .lstbutton {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .lstbutton ul {
        list-style: none;
        display: flex;
        gap: 10px;
        text-align: center;
        margin-right: auto;
        width: 100%;
    }

     .lstbutton ul li {
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }

    button {
        width: 100%;
        height: 40px;
    }

    .btn_accept {
        background-color: #5E7B51;
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 10px;
        transition: .3s ease-in-out;
        font-size: 14px;
    }

    .btn_accept:hover {
        background-color: #a1a1f8;
        transition: .3s ease-in-out;
        scale: 1.1;
        cursor: pointer;
    }

    .btn_refuse {
        background-color: transparent;
        border: 1px solid #5E7B51;
        border-radius: 10px;
        transition-duration: 0.4s;
        font-size: 14px;
        font-weight: 700;
    }

    .btn_refuse:hover {
        transition-duration: 0.4s;
        cursor: pointer;
    }
</style>

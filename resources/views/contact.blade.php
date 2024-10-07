<!DOCTYPE html>
<html lang="en">
    <head>
        <x-head/>
    </head>
<body>
    <header>
        <x-navbar/>
    </header>
    <main>
        <div class="contactForm">
            <h1>Contact</h1>
            <form action="#" method="POST">
                <label for="naam">Naam: </label>
                <input type="text" name="naam"/>

                <label for="info">Reden voor contact: </label>
                <input type="text" name="reden"/>

                <label for="info">Overige info: </label>
                <input type="text" name="info"/>

                <input type="submit" value="versturen" disabled>
            </form>
        </div>
    </main>
    <footer>
        <x-footer/>
    </footer>
</body>
</html>

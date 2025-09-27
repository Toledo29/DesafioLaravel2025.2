<div>
    <h1>Envio de Email</h1>
    <form action='{{ route("admins.sendEmail") }}' method="POST">
        @csrf
        <label for="email">Email do Destinatário:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" required></textarea>

        <button type="submit">Enviar Email</button>
    </form>
</div>
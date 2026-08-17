<!-- method="POST" всегда, даже если мы обновляем данные -->
<form action="/user/{{ $user->id }}" method="POST">

    <!-- Обязательная защита от CSRF-атак -->
    @csrf

    <!-- Эта строка говорит Laravel: "воспринимай этот POST как PUT" -->
    @method('PUT')

    <div class="form-group">
        <label for="name">Имя пользователя:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <button type="submit">Сохранить изменения</button>
</form>
<?php

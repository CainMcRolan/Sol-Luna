<?php

require "partials/head.php";
require "partials/background.php";
require "partials/header.php";
require "partials/nav.php";
?>
    <div class="w-full h-full overflow-auto p-4 flex flex-col ">
        <h1 class="text-lg font-bold mt-2 2xl:text-2xl">Calculator</h1>
        <hr class="border border-[#61a0ff] w-full">
        <p class="lg:text-sm 2xl:text-sm">just a basic and typical input output calculator, i hope u like it😃
        </p>
        <div class="self-center lg:w-2/3 2xl:w-3/5 my-2">
            <form action="/calculator" method="POST" class="flex flex-col">
                <label class="font-bold text-md" for="num_1">Number 1:</label>
                <input class="border border-blue-500 p-1 font-bold text-md" type="text" name="num_1" id="num_1">
                <label class="font-bold text-md" for="num_2">Number 2:</label>
                <input class="border border-blue-500 p-1 font-bold text-md" type="text" name="num_2" id="num_2">
                <label class="font-bold text-md" for="operation">Operation: </label>
                <select class="border border-blue-500 p-1 font-bold text-md" name="operation" id="operation">
                    <option value="Add" selected>Add</option>
                    <option value="Subtract">Subtract</option>
                    <option value="Multiply">Multiply</option>
                    <option value="Divide">Divide</option>
                </select>
                <button class="border border-blue-500 p-1 mt-2 hover:bg-blue-300" type="submit"
                        value="Calculate">Calculate</button>
            </form>
            <p class="text-center text-red-500 font-bold mt-2 text-2xl"><?= htmlspecialchars($result ??
                    $errors['body'] ?? '')
            ?></p>
        </div>
    </div>

<?php
require "partials/aside.php";
require "partials/footer.php";
?>
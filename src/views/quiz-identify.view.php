<?php

require "partials/head.php";
require "partials/background.php";
require "partials/header.php";
require "partials/nav.php";
?>
    <div class="w-full h-full overflow-auto p-4 flex flex-col ">
        <h1 class="text-lg font-bold mt-2 2xl:text-2xl">Technical Check-in v2</h1>
        <hr class="border border-[#61a0ff] w-full">
        <p class="lg:text-sm 2xl:text-sm"></p>
        <?php if ($result_message) : ?>
            <h1 class="text-[#003f9e] underline cursor-pointer font-bold text-center">score:<?= htmlspecialchars
                ($result_message) ?></h1>
            <form action="/quiz-identify" method="POST">
                <input class="border border-blue-500 p-1 mt-2 hover:bg-blue-300 cursor-pointer" type="submit"
                       name="reset" value="Reset">
            </form>
        <?php else: ?>
            <form action="/quiz-identify" method="POST" class="flex justify-center w-full">
                <fieldset class="border border-[#61a0ff] flex flex-col justify-center items-center lg:w-[30rem]">
                    <legend class="lg:font-bold lg:text-md 2xl:text-base">Question <?= $_SESSION['question_count'] + 1
                        ?></legend>
                    <h1 class="text-[#003f9e] cursor-pointer font-bold text-center"><?= htmlspecialchars
                        ($current_question)
                        ?></h1>
                    <div class="grid w-3/4">
                        <input name="answer" id="answer" type="text" class="border border-[#61a0ff]
                            mt-2 p-1 text-center
                            lg:w-full" placeholder="Answer">
                    </div>
                    <p class="text-red-500 font-bold"><?= htmlspecialchars($error_message ?? '') ?></p>
                    <div>
                        <input class="border border-blue-500 p-1 mt-2 hover:bg-blue-300 cursor-pointer" type="submit"
                               name="reset"
                               value="Reset">
                        <input class="border border-blue-500 p-1 mt-2 hover:bg-blue-300 cursor-pointer" type="submit"
                               value=<?=
                        $_SESSION['question_count'] === count($quiz) - 1 ? 'Finish' : 'Next' ?>>
                    </div>

                </fieldset>
            </form>
        <?php endif; ?>
    </div>
<?php
require "partials/aside.php";
require "partials/footer.php";
?>
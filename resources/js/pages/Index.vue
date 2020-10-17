<template>

    <div>

        <div class="card w-full md:w-1/2 mx-auto">

            <h2>
                Bingo
            </h2>

            <div class="card-body space-y-4">
                <p>
                    Create public shareable interactive bingo games with unlimited players.
                    No account required. No ads. No bullshit.
                </p>
                <p>
                    When sharing a bingo game, each player will receive an own randomized board.
                </p>
            </div>

            <div class="card-footer">

                <router-link :to="{ name: 'games.create.start' }" class="button button-blue">
                    Create game
                </router-link>

            </div>

        </div>

    </div>

</template>

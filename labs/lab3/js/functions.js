
            var randomNumber = Math.floor(Math.random() *99)+1;
            var guesses = document.querySelector('#guesses');
            var games = document.querySelector('#games');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            var guessCount = 1;
            
            var gamesWon = 0;
            var gamesLost = 0;
            
            $("#games").text("Games won: " + gamesWon +" | Games lost: " + gamesLost);
            
            var resetButton = document.querySelector('#reset');
            $("#reset").hide(); //jQuery replacement
            guessField.focus();
            
            
            
            function checkGuess()
            {
                var userGuess = Number(guessField.value);
                
                if (guessCount === 1)
                {
                    $("#guesses").text("Previous guesses: "); //jQuery replacement
                    
                }
                
                
                
                    if(Math.floor(userGuess) == userGuess && $.isNumeric(userGuess)) 
                    {
                        if (userGuess > 99 || userGuess < 1)
                        {
                            $("#lowOrHi").text("Last guess was out of range, try again.");
                        }
                    
                        else
                        {
                            if (userGuess === randomNumber)
                            {
                                $("#lastResult").text("Congratulations! You got it right!"); //jQuery replacement
                                gamesWon++;
                                lastResult.style.backgroundColor = 'green';
                                lowOrHi.innerHTML = "";
                                setGameOver();
                            }
                            
                            else if (guessCount === 7)
                            {
                                $("#lastResult").text("Sorry, you lost!"); //jQuery replacement
                                gamesLost++;
                                setGameOver();
                            }
                            
                            else
                            {
                                lastResult.innerHTML = "Wrong!";
                                lastResult.style.backgroundColor = 'red';
                                
                                if (userGuess < randomNumber)
                                {
                                    $("#lowOrHi").text("Last guess was too low!"); //jQuery replacement
                                }
                                else
                                {
                                    $("#lowOrHi").text("Last guess was too high!"); //jQuery replacement
                                }
                                
                            }
                            
                            guessCount++;
                            guessField.value = "";
                            guessField.focus();
                            
                            guesses.innerHTML += userGuess + " ";
                        }
                    
                        
                    }
                    else
                    {
                        $("#lowOrHi").text("Last guess was not a number, try again.");
                    }
            }
            
            guessSubmit.addEventListener('click', checkGuess);
            
            function setGameOver()
            {
                
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }
            
            function resetGame()
            {
                guessCount = 1;
                
                var resetParas = document.querySelectorAll('.resultParas p');
                for( var i = 0; i < resetParas.length; i++)
                {
                    resetParas[i].textContent = '';
                }
                

                $("#reset").hide();
                
                $("#games").text("Games won: " + gamesWon +" | Games lost: " + gamesLost);
                
                
                
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                
                lastResult.style.backgroundColor = 'white';
                
                randomNumber = Math.floor(Math.random() * 99) +1;
            }

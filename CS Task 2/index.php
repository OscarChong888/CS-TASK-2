<?php
// Start the session first
session_start();

// Then set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Now check session status
if (session_status() !== PHP_SESSION_ACTIVE) {
    die('Session not active');
}

// Handle the start button click
if (isset($_POST['start'])) {
    $_SESSION['gameStarted'] = true;
    $_SESSION['level'] = 1;
    $_SESSION['playerStyle'] = [
        'aggressive' => 0,
        'strategic' => 0,
        'defensive' => 0
    ];

    // Debugging session variable
    var_dump($_SESSION); // Check session contents
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Check if the game has started
if (!isset($_SESSION['gameStarted'])) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to Chess Adventure</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #2f3136;  /* Dark gray background */
                color: white;
                margin: 0;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 0;
            }
            .start-container {
                background: #36393f;  /* Slightly lighter gray */
                padding: 40px;
                border-radius: 15px;
                max-width: 800px;
                margin: 40px auto;
                text-align: center;
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
                flex: 1;
            }
            h1 {
                color: #4fd1c5;
                font-size: 2.5em;
                margin-bottom: 20px;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }
            p {
                font-size: 1.2em;
                line-height: 1.6;
                margin-bottom: 30px;
            }
            .start-button {
                display: inline-block;
                padding: 15px 30px;
                background-color: #4fd1c5;
                color: #1e3c72;
                text-decoration: none;
                border-radius: 25px;
                font-weight: bold;
                font-size: 1.2em;
                transition: all 0.3s ease;
            }
            .start-button:hover {
                background-color: #38b2ac;  /* Darker turquoise */
                transform: scale(1.05);
            }
            .chess-icon {
                font-size: 3em;
                margin-bottom: 20px;
            }
            .discover-section {
                margin: 50px 0;
                padding: 30px;
                background: #40444b;  /* Matching card background */
                border-radius: 15px;
            }
            .discover-section h2 {
                color: #4fd1c5;
                font-size: 2em;
                margin-bottom: 30px;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }
            .discover-grid {
                display: flex;
                justify-content: space-around;
                gap: 30px;
                margin-top: 30px;
            }
            .discover-item {
                text-align: center;
                flex: 1;
                max-width: 200px;
            }
            .discover-icon {
                font-size: 3em;
                margin-bottom: 15px;
            }
            .personality-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 15px;
                margin-top: 40px;
            }
            .personality-card {
                background: #40444b;  /* Even lighter gray for cards */
                padding: 15px;
                border-radius: 10px;
                transition: transform 0.3s ease;
            }
            .personality-card:hover {
                transform: translateY(-5px);
                background: #454950;  /* Slightly lighter on hover */
            }
            .personality-icon {
                font-size: 2em;
                margin-bottom: 10px;
            }
            .personality-title {
                font-weight: bold;
                color: #4fd1c5;
                margin-bottom: 5px;
            }
            .personality-desc {
                font-size: 0.9em;
                line-height: 1.3;
            }
            .footer {
                background: #202225;  /* Darker gray for footer */
                padding: 20px 0;
                text-align: center;
                width: 100%;
                margin-top: 40px;
                bottom: 0;
                left: 0;
                right: 0;
            }
            .footer p {
                margin: 5px 0;
                font-size: 0.9em;
                color: rgba(255, 255, 255, 0.7);
            }
        </style>
    </head>
    <body>
        <div class="start-container">
            <div class="chess-icon">♟️</div>
            <h1>Welcome to Chess Adventure</h1>
            <p>Embark on an exciting journey through the world of chess! Your choices will determine your playing style and shape your destiny on the board.</p>
            <p>Are you ready to begin your adventure?</p>
            <form method="POST">
                <button type="submit" name="start" class="start-button">Start Adventure</button>
            </form>

            <div class="discover-section">
                <h2>Answer 20 Questions and Find Out...</h2>
                <div class="discover-grid">
                    <div class="discover-item">
                        <div class="discover-icon">👥</div>
                        <p>Your chess personality</p>
                    </div>
                    <div class="discover-item">
                        <div class="discover-icon">📖</div>
                        <p>Best openings for your style</p>
                    </div>
                    <div class="discover-item">
                        <div class="discover-icon">👑</div>
                        <p>Which masters you are most like</p>
                    </div>
                </div>
            </div>

            <div class="personality-grid">
                <div class="personality-card">
                    <div class="personality-icon">♖</div>
                    <div class="personality-title">ANACONDA</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♚</div>
                    <div class="personality-title">ARTIST</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♗</div>
                    <div class="personality-title">ASSASIN</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♖</div>
                    <div class="personality-title">CAVEMAN</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♛</div>
                    <div class="personality-title">GRAPPLER</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♗</div>
                    <div class="personality-title">INVENTOR</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♟</div>
                    <div class="personality-title">JESTER</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♞</div>
                    <div class="personality-title">MACHINE</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♕</div>
                    <div class="personality-title">MAD SCIENTIST</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♞</div>
                    <div class="personality-title">MAGICIAN</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♕</div>
                    <div class="personality-title">MASTERMIND</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♟</div>
                    <div class="personality-title">PROFESSOR</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♗</div>
                    <div class="personality-title">ROMANTIC</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♖</div>
                    <div class="personality-title">SWINDLER</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♚</div>
                    <div class="personality-title">TECHNICIAN</div>
                </div>
                <div class="personality-card">
                    <div class="personality-icon">♟</div>
                    <div class="personality-title">WILDCARD</div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2024 Chess Adventure. All rights reserved.</p>
            <p>Created by Oscar Chong</p>
        </footer>
    </body>
    </html>';
    exit;
}

// Initialize level and player style if not already set
if (!isset($_SESSION['level'])) {
    $_SESSION['level'] = 1;
    $_SESSION['playerStyle'] = [
        'aggressive' => 0,
        'strategic' => 0,
        'defensive' => 0
    ];
}

// Define levels and their choices
$levels = [
    1 => [
        'story' => "Your journey into the world of chess begins! Before you lies a forked path, each offering a unique style of play. Which will you embrace?",
        'choices' => [
            'Charge forward with fearless determination!' => 'aggressive',
            'Lay out a master plan and tread carefully.' => 'strategic',
            'Fortify your defenses and stand firm.' => 'defensive'
        ]
    ],
    2 => [
        'story' => "A mighty knight appears before you, poised for battle. How will you deal with this formidable foe?",
        'choices' => [
            'Engage in a daring clash to take it down!' => 'aggressive',
            'Lure the knight into a clever snare.' => 'strategic',
            'Hold your position and stand your ground.' => 'defensive'
        ]
    ],
    3 => [
        'story' => "A humble pawn blocks your path, but even the smallest piece can turn the tide. What’s your move?",
        'choices' => [
            'Sacrifice boldly to carve a way through!' => 'aggressive',
            'Weave a chain of pawns to gain control.' => 'strategic',
            'Protect the integrity of your pawn structure.' => 'defensive'
        ]
    ],
    4 => [
        'story' => "The enemy queen roams freely across the battlefield, a dangerous adversary. How will you respond?",
        'choices' => [
            'Pursue her with swift and relentless attacks!' => 'aggressive',
            'Develop your forces while boxing her in.' => 'strategic',
            'Reinforce critical squares and protect your key pieces.' => 'defensive'
        ]
    ],
    5 => [
        'story' => "The center of the board is ablaze with conflict. Every move here carries weight. How do you claim the heart of the battlefield?",
        'choices' => [
            'Push your pawns forward, commanding space!' => 'aggressive',
            'Bring your forces into harmony to dominate.' => 'strategic',
            'Fortify your lines and maintain stability.' => 'defensive'
        ]
    ],
    6 => [
        'story' => "Your opponent castles, sheltering their king behind a wall of pawns. How do you plan your next move?",
        'choices' => [
            'Unleash a devastating kingside assault!' => 'aggressive',
            'Pressure their position from every angle.' => 'strategic',
            'Ensure your own king is safe before advancing.' => 'defensive'
        ]
    ],
    7 => [
        'story' => "The board brims with potential, yet the pieces are evenly matched. How will you navigate this complex position?",
        'choices' => [
            'Create chaos and force mistakes!' => 'aggressive',
            'Refine your positions with precision.' => 'strategic',
            'Simplify the battlefield and reduce threats.' => 'defensive'
        ]
    ],
    8 => [
        'story' => "Victory is within reach! You hold a slight advantage. How will you press forward?",
        'choices' => [
            'Strike decisively and secure your edge!' => 'aggressive',
            'Accumulate small, steady advantages.' => 'strategic',
            'Deny your opponent any chance of a comeback.' => 'defensive'
        ]
    ],
    9 => [
        'story' => "A bold sacrifice is offered by your opponent. A trap, or a golden opportunity? What will you do?",
        'choices' => [
            'Accept the challenge and counterattack!' => 'aggressive',
            'Analyze the consequences with care.' => 'strategic',
            'Decline and fortify your defenses.' => 'defensive'
        ]
    ],
    10 => [
        'story' => "The position has become a battlefield of locked pawns and closed lines. How will you make progress?",
        'choices' => [
            'Break open the position with a daring sacrifice!' => 'aggressive',
            'Prepare meticulously for a powerful breakthrough.' => 'strategic',
            'Wait patiently for your opponent’s mistake.' => 'defensive'
        ]
    ],
    11 => [
        'story' => "You glimpse a brilliant tactical combination. The opportunity is fleeting. What’s your move?",
        'choices' => [
            'Strike immediately with the tactic!' => 'aggressive',
            'Seek an even greater advantage.' => 'strategic',
            'Ensure your position is solid first.' => 'defensive'
        ]
    ],
    12 => [
        'story' => "The enemy king stands exposed, vulnerable to attack. How will you exploit this weakness?",
        'choices' => [
            'Launch an all-out assault!' => 'aggressive',
            'Build up pressure patiently for a decisive blow.' => 'strategic',
            'Eliminate counterplay before attacking.' => 'defensive'
        ]
    ],
    13 => [
        'story' => "The clock ticks down mercilessly, and you’re under time pressure. What’s your plan?",
        'choices' => [
            'Play fast and force your opponent to react!' => 'aggressive',
            'Identify and focus on critical moves.' => 'strategic',
            'Simplify the position to reduce risk.' => 'defensive'
        ]
    ],
    14 => [
        'story' => "Your opponent’s pawns are weak and exposed. How will you exploit them?",
        'choices' => [
            'Target the weak pawns with immediate threats!' => 'aggressive',
            'Limit their mobility and build control.' => 'strategic',
            'Fortify your own pawn structure to stay ahead.' => 'defensive'
        ]
    ],
    15 => [
        'story' => "The endgame approaches. Only the strongest strategy will prevail. How do you prepare?",
        'choices' => [
            'Push forward and create a deadly passed pawn!' => 'aggressive',
            'Position your pieces to dominate the board.' => 'strategic',
            'Shield your king and maintain a solid structure.' => 'defensive'
        ]
    ],
    16 => [
        'story' => "A tactical opportunity shines before you. How will you capitalize on this chance?",
        'choices' => [
            'Seize the moment without hesitation!' => 'aggressive',
            'Lay the groundwork for a stronger strike.' => 'strategic',
            'Reinforce your defenses before taking action.' => 'defensive'
        ]
    ],
    17 => [
        'story' => "Your opponent’s pieces are scattered and uncoordinated. What’s your strategy?",
        'choices' => [
            'Strike at their weak spots immediately!' => 'aggressive',
            'Restrict their movements and prepare your attack.' => 'strategic',
            'Consolidate your position to ensure safety.' => 'defensive'
        ]
    ],
    18 => [
        'story' => "Your bishops dominate the board. How will you wield the bishop pair advantage?",
        'choices' => [
            'Tear open the board for their full power!' => 'aggressive',
            'Position them on commanding diagonals.' => 'strategic',
            'Use them as a shield for your defense.' => 'defensive'
        ]
    ],
    19 => [
        'story' => "A pawn break is necessary to shatter the impasse. What’s your strategy?",
        'choices' => [
            'Execute the break without delay!' => 'aggressive',
            'Prepare with precise support moves.' => 'strategic',
            'Wait for the perfect moment to strike.' => 'defensive'
        ]
    ],
    20 => [
        'story' => "Your king and your opponent’s stand worlds apart, divided by the battlefield. How will you lead the charge?",
        'choices' => [
            'Commit all forces to an all-out attack!' => 'aggressive',
            'Strike a balance between offense and defense.' => 'strategic',
            'Fortify your king’s safety before advancing.' => 'defensive'
        ]
    ]    
];

// Handle player choice
if (isset($_GET['choice'])) {
    $choice = $_GET['choice'];
    $_SESSION['playerStyle'][$choice]++;
    $_SESSION['level']++;

    // Check if all levels are completed
    if ($_SESSION['level'] > count($levels)) {
        $playerStyle = $_SESSION['playerStyle'];
        $personality = determinePersonality($playerStyle);

        // Define chess masters for each personality
        $chessMasters = [
            'ANACONDA' => 'Magnus Carlsen',
            'ARTIST' => 'Judit Polgar',
            'ASSASSIN' => 'Garry Kasparov',
            'CAVEMAN' => 'Ian Nepomniachtchi',
            'GRAPPLER' => 'Hikaru Nakamura',
            'INVENTOR' => 'Gothamchess',
            'JESTER' => 'Anish Giri',
            'MACHINE' => 'Gukesh D',
            'MAD SCIENTIST' => 'Anna Cramling',
            'MAGICIAN' => 'Alireza Firouzja',
            'MASTERMIND' => 'Fabiano Caruana',
            'PROFESSOR' => 'Viswanathan Anand',
            'ROMANTIC' => 'Paul Morphy',
            'SWINDLER' => 'Botez Sisters',
            'TECHNICIAN' => 'Ding Liren',
            'WILDCARD' => 'Eric Hansen'
        ];

        $openings = [
            'ANACONDA' => 'London System',
            'ARTIST' => 'Trompowsky Attack ',
            'ASSASSIN' => 'Fantasy Variation',
            'CAVEMAN' => 'Scotch Game',
            'GRAPPLER' => 'Exchange Slav',
            'INVENTOR' => 'Reti Opening',
            'JESTER' => 'Evans Gambit',
            'MACHINE' => 'Queen&apos;s Gambit',
            'MAD SCIENTIST' => 'Larsen&apos;s Opening',
            'MAGICIAN' => 'English Attack',
            'MASTERMIND' => 'Bobby Fischer',
            'PROFESSOR' => 'Ruy Lopez',
            'ROMANTIC' => 'King&apos;s Gambit',
            'SWINDLER' => 'King&apos;s Indian Attack',
            'TECHNICIAN' => 'Four Knights Game',
            'WILDCARD' => 'Nakhmanson Gambit'
        ];

        $openings2 = [
            'ANACONDA' => 'Semi-Tarrsch Defense',
            'ARTIST' => 'Budapest Gambit',
            'ASSASSIN' => 'Sicilian Dragon',
            'CAVEMAN' => 'French Defense',
            'GRAPPLER' => 'Berlin Defense',
            'INVENTOR' => 'Philidor Defense',
            'JESTER' => 'Stafford Gambit',
            'MACHINE' => 'Caro Kann',
            'MAD SCIENTIST' => 'Modern Defense',
            'MAGICIAN' => 'King&apos;s Indian Defense',
            'MASTERMIND' => 'Benoni Defense',
            'PROFESSOR' => 'Sicilian Najdorf',
            'ROMANTIC' => 'Scandinavian Defense',
            'SWINDLER' => 'Benko Gambit',
            'TECHNICIAN' => 'Slav Defense',
            'WILDCARD' => 'Albin Countergambit'
        ];

        $trait1 = [
            'ANACONDA' => '21',
            'ARTIST' => '21',
            'ASSASSIN' => '21',
            'CAVEMAN' => '21',
            'GRAPPLER' => '79',
            'INVENTOR' => '57',
            'JESTER' => '57',
            'MACHINE' => '57',
            'MAD SCIENTIST' => '79',
            'MAGICIAN' => '79',
            'MASTERMIND' => '57',
            'PROFESSOR' => '21',
            'ROMANTIC' => '36',
            'SWINDLER' => '21',
            'TECHNICIAN' => '79',
            'WILDCARD' => '36'
        ];

        $trait2 = [
            'ANACONDA' => '57',
            'ARTIST' => '79',
            'ASSASSIN' => '36',
            'CAVEMAN' => '21',
            'GRAPPLER' => '57',
            'INVENTOR' => '79',
            'JESTER' => '21',
            'MACHINE' => '21',
            'MAD SCIENTIST' => '36',
            'MAGICIAN' => '36',
            'MASTERMIND' => '79',
            'PROFESSOR' => '57',
            'ROMANTIC' => '21',
            'SWINDLER' => '36',
            'TECHNICIAN' => '57',
            'WILDCARD' => '79'
        ];

        $trait3 = [
            'ANACONDA' => '36',
            'ARTIST' => '79',
            'ASSASSIN' => '21',
            'CAVEMAN' => '57',
            'GRAPPLER' => '94',
            'INVENTOR' => '36',
            'JESTER' => '36',
            'MACHINE' => '36',
            'MAD SCIENTIST' => '79',
            'MAGICIAN' => '79',
            'MASTERMIND' => '57',
            'PROFESSOR' => '21',
            'ROMANTIC' => '79',
            'SWINDLER' => '36',
            'TECHNICIAN' => '21',
            'WILDCARD' => '57'
        ];

        $trait4 = [
            'ANACONDA' => '21',
            'ARTIST' => '57',
            'ASSASSIN' => '79',
            'CAVEMAN' => '36',
            'GRAPPLER' => '36',
            'INVENTOR' => '21',
            'JESTER' => '6',
            'MACHINE' => '21',
            'MAD SCIENTIST' => '6',
            'MAGICIAN' => '57',
            'MASTERMIND' => '57',
            'PROFESSOR' => '79',
            'ROMANTIC' => '94',
            'SWINDLER' => '21',
            'TECHNICIAN' => '57',
            'WILDCARD' => '21'
        ];

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Your Chess Personality - Chess Adventure</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: #2f3136;
                    color: white;
                    text-align: center;
                    padding: 50px 20px;
                    min-height: 100vh;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
                .completion-container {
                    background: #36393f;
                    padding: 40px;
                    border-radius: 15px;
                    max-width: 600px;
                    margin: 0 auto;
                    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
                }
                .personality-result {
                    background: #40444b;
                    padding: 30px;
                    border-radius: 15px;
                    margin: 20px 0;
                }
                .personality-name {
                    color: #4fd1c5;
                    font-size: 2em;
                    margin-bottom: 15px;
                }
                .personality-desc {
                    font-size: 1.2em;
                    line-height: 1.6;
                    margin-bottom: 20px;
                }
                h1 {
                    color: #4fd1c5;
                    margin-bottom: 30px;
                    font-size: 2.5em;
                    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
                }
                .play-again {
                    display: inline-block;
                    padding: 15px 30px;
                    background-color: #4fd1c5;
                    color: #1e3c72;
                    text-decoration: none;
                    border-radius: 25px;
                    font-weight: bold;
                    transition: all 0.3s ease;
                }
                .play-again:hover {
                    background-color: #38b2ac;
                    transform: scale(1.05);
                }
                .trait-bar {
                    margin: 15px 0;
                    padding: 10px;
                    background: #40444b;
                    border-radius: 10px;
                }
                
                .trait-row {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin: 10px 0;
                }
                
                .trait-label {
                    width: 120px;
                    text-align: left;
                    color: #ffffff;
                }
                
                .trait-meter {
                    flex-grow: 1;
                    height: 20px;
                    background: #2f3136;
                    margin: 0 15px;
                    border-radius: 10px;
                    position: relative;
                }
                
                .trait-line {
                    position: absolute;
                    width: 4px;
                    height: 100%;
                    background: #4fd1c5;
                    transform: translateX(-50%);
                }
                
                .trait-value {
                    position: absolute;
                    height: 100%;
                    background: #4fd1c5;
                    border-radius: 10px;
                }
                
                .trait-opposite {
                    width: 120px;
                    text-align: right;
                    color: #ffffff;
                }

                .openings {
                    margin-top: 30px;
                    padding: 20px;
                    background: #40444b;
                    border-radius: 10px;
                }

                .openings h3 {
                    color: #4fd1c5;
                    margin-bottom: 15px;
                }

                .opening-link {
                    color: #4fd1c5;
                    text-decoration: underline;
                }

                .player-like-you {
                    background: #40444b;
                    padding: 20px;
                    border-radius: 10px;
                    margin: 20px 0;
                    display: flex;
                    align-items: center;
                    gap: 20px;
                }
                
                .player-like-you img {
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    object-fit: cover;
                }
                
                .player-info {
                    text-align: left;
                }
                
                .player-info h3 {
                    color: #4fd1c5;
                    margin: 0 0 10px 0;
                }

                .personality-grid {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    gap: 15px;
                    margin-top: 40px;
                }

                .personality-card {
                    background: #40444b;
                    padding: 15px;
                    border-radius: 10px;
                    transition: transform 0.3s ease;
                    text-align: center;
                }

                .personality-card:hover {
                    transform: translateY(-5px);
                    background: #454950;
                }

                .personality-icon {
                    font-size: 2em;
                    margin-bottom: 10px;
                }

                .personality-title {
                    font-weight: bold;
                    color: #4fd1c5;
                }

                .current {
                    border: 2px solid #4fd1c5;
                    box-shadow: 0 0 15px rgba(79, 209, 197, 0.3);
                }
            </style>
        </head>
        <body>
            <div class="completion-container">
                <h1>🎉 Your Chess Personality Revealed! 🎉</h1>
                
                <!-- Personality Result -->
                <div class="personality-result">
                    <div class="personality-name">' . $personality['name'] . '</div>
                    <div class="personality-desc">' . $personality['description'] . '</div>
                </div>

                <!-- Player Like You Section -->
                <div class="player-like-you">
                    <img src="images/masters/' . ($chessMasters[$personality['name']]) . '.png" alt="' . $chessMasters[$personality['name']] . '">
                    <div class="player-info">
                        <h3>PLAYER LIKE YOU</h3>
                        <p>' . $chessMasters[$personality['name']] . ' is a ' . $personality['name'] . '</p>
                    </div>
                </div>

                <!-- Trait Bars -->
                <div class="trait-bar">
                    <div class="trait-row">
                        <span class="trait-label">INTUITION</span>
                        <div class="trait-meter">
                            <div class="trait-line" style="left: ' . $trait1[$personality['name']] . '%;"></div>
                        </div>
                        <span class="trait-opposite">CALCULATION</span>
                    </div>
                    <div class="trait-row">
                        <span class="trait-label">ATTACKING</span>
                        <div class="trait-meter">
                            <div class="trait-line" style="left: ' . $trait2[$personality['name']] . '%;"></div>
                        </div>
                        <span class="trait-opposite">POSITIONAL</span>
                    </div>
                    <div class="trait-row">
                        <span class="trait-label">CALM</span>
                        <div class="trait-meter">
                            <div class="trait-line" style="left: ' . $trait3[$personality['name']] . '%;"></div>
                        </div>
                        <span class="trait-opposite">EMOTIONAL</span>
                    </div>
                    <div class="trait-row">
                        <span class="trait-label">PLAYFUL</span>
                        <div class="trait-meter">
                            <div class="trait-line" style="left: ' . $trait4[$personality['name']] . '%;"></div>
                        </div>
                        <span class="trait-opposite">STUDIOUS</span>
                    </div>
                </div>

                <!-- Openings -->
                <div class="openings">
                    <h3>RECOMMENDED OPENINGS</h3>
                    <p>Try the <a href="#" class="opening-link">'. $openings[$personality['name']] .'</a> or <a href="#" class="opening-link">'. $openings2[$personality['name']] .'</a></p>
                </div>

                <!-- Personality Grid -->
                <h2>All Chess Personalities</h2>
                <div class="personality-grid">';
                
                // Define all personalities with their descriptions
                $allPersonalities = [
                    'ANACONDA' => [
                        'description' => 'Masters of long-term planning and positional play. Anacondas constrict their opponents slowly but surely, preferring strategic depth over tactical fireworks. They excel at endgame positions and gradually accumulating small advantages.',
                        'icon' => '♜',
                        'master' => 'Anatoly Karpov',
                        'openings' => ['London System', 'Semi-Tarrsch Defense'],
                        'traits' => [
                            'intuition' => 45,
                            'attacking' => 15,
                            'calm' => 50,
                            'playful' => 35
                        ]
                    ],
                    'ARTIST' => [
                        'description' => 'Bold and attacking players who create masterpieces on the board. Artists seek beauty in their moves and aren\'t afraid to sacrifice material for initiative. They play with flair and imagination, often finding unexpected solutions.',
                        'icon' => '♚',
                        'master' => 'Mikhail Tal',
                        'openings' => ['King\'s Gambit', 'Sicilian Dragon'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 90,
                            'calm' => 35,
                            'playful' => 65
                        ]
                    ],
                    'ASSASSIN' => [
                        'description' => 'Patient positional players who strike at the perfect moment. Assassins excel at finding and exploiting small weaknesses in their opponent\'s position. They are masters of quiet preparation followed by decisive action.',
                        'icon' => '♝',
                        'master' => 'Vladimir Kramnik',
                        'openings' => ['Berlin Defense', 'Catalan Opening'],
                        'traits' => [
                            'intuition' => 40,
                            'attacking' => 50,
                            'calm' => 80,
                            'playful' => 35
                        ]
                    ],
                    'CAVEMAN' => [
                        'description' => 'What Cavemen lack in subtlety, they make up for in raw attacking power. Their intuition is strong, and once they have an attack underway, they seldom let their opponent&apos;s escape. Cavemen tend to be emotional, and when riding high, they are a force to be reckoned with. In contrast, when on tilt, they can struggle to regain their form.',
                        'icon' => '♜',
                        'master' => 'GaKasparov',
                        'openings' => ['Scotch Game', 'French Defense'],
                        'traits' => [
                            'intuition' => 75,
                            'attacking' => 95,
                            'calm' => 25,
                            'playful' => 50
                        ]
                    ],
                    'GRAPPLER' => [
                        'description' => 'Grapplers are positional masters with a flair for entertainment. Suppressing their opponent\'s best ideas while systematically gaining the upper hand, they excel at technical positions requiring precise play.',
                        'icon' => '♛',
                        'master' => 'Magnus Carlsen',
                        'openings' => ['Exchange Slav', 'Berlin Defense'],
                        'traits' => [
                            'intuition' => 65,
                            'attacking' => 45,
                            'calm' => 85,
                            'playful' => 50
                        ]
                    ],
                    'INVENTOR' => [
                        'description' => 'Inventors forge new paths with unique styles combining calculation with positional play. Their method in madness leads to creative ideas in seemingly simple positions. They find joy in discovering new possibilities.',
                        'icon' => '♝',
                        'master' => 'Richard Reti',
                        'openings' => ['Reti Opening', 'Philidor Defense'],
                        'traits' => [
                            'intuition' => 75,
                            'attacking' => 55,
                            'calm' => 60,
                            'playful' => 85
                        ]
                    ],
                    'JESTER' => [
                        'description' => 'Jesters are always having fun. Chess is a game to them, but don\'t let their playful nature fool you. They create tricks, traps, and swindles, making them dangerous opponents who can turn any position into an adventure.',
                        'icon' => '♟',
                        'master' => 'Anish Giri',
                        'openings' => ['Evans Gambit', 'Stafford Gambit'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 65,
                            'calm' => 45,
                            'playful' => 95
                        ]
                    ],
                    'MACHINE' => [
                        'description' => 'Machines are relentless opponents, constantly exerting pressure and quickly seizing on errors. They are patient and unhurried, letting confidence and good calculation guide their pieces to decisive squares.',
                        'icon' => '♞',
                        'master' => 'Gukesh D',
                        'openings' => ['Queen\'s Gambit', 'Caro Kann'],
                        'traits' => [
                            'intuition' => 25,
                            'attacking' => 55,
                            'calm' => 90,
                            'playful' => 35
                        ]
                    ],
                    'MAD SCIENTIST' => [
                        'description' => 'Mad Scientists cook up dangerous ideas for their opponents. Their zany personalities mask their genius, and they\'re skilled at creating unusual positions where their creative planning thrives.',
                        'icon' => '♛',
                        'master' => 'Alexander Alekhine',
                        'openings' => ['Larsen\'s Opening', 'Modern Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 75,
                            'calm' => 35,
                            'playful' => 80
                        ]
                    ],
                    'MAGICIAN' => [
                        'description' => 'Magicians set the board on fire with spectacular combinations. With deep tactical understanding and creative vision, they weave together incredible sequences that leave spectators in awe.',
                        'icon' => '♞',
                        'master' => 'Alireza Firouzja',
                        'openings' => ['Italian Opening', 'King\'s Indian Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 80,
                            'calm' => 45,
                            'playful' => 75
                        ]
                        ],
                    'MASTERMIND' => [
                        'description' => 'Magicians set the board on fire with spectacular combinations. With deep tactical understanding and creative vision, they weave together incredible sequences that leave spectators in awe.',
                        'icon' => '♛',
                        'master' => 'Alireza Firouzja',
                        'openings' => ['Italian Opening', 'King\'s Indian Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 80,
                            'calm' => 45,
                            'playful' => 75
                        ]
                        ],
                    'PROFESSOR' => [
                        'description' => 'Professors are the scholars of chess, combining deep theoretical knowledge with practical skills. They excel in understanding complex positions and often outmaneuver their opponents with well-prepared strategies.',
                        'icon' => '♟',
                        'master' => 'Alireza Firouzja',
                        'openings' => ['Italian Opening', 'King\'s Indian Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 80,
                            'calm' => 45,
                            'playful' => 75
                        ]
                        ],
                    'ROMANTIC' => [
                        'description' => 'Magicians set the board on fire with spectacular combinations. With deep tactical understanding and creative vision, they weave together incredible sequences that leave spectators in awe.',
                        'icon' => '♝',
                        'master' => 'Alireza Firouzja',
                        'openings' => ['Italian Opening', 'King\'s Indian Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 80,
                            'calm' => 45,
                            'playful' => 75
                        ]
                        ],
                    'SWINDLER' => [
                        'description' => 'Swindlers thrive in chaotic positions, using their creativity to turn the tables on their opponents. They often rely on tactical tricks and unexpected moves to gain the upper hand.',
                        'icon' => '♜',
                        'master' => 'Alireza Firouzja',
                        'openings' => ['Italian Opening', 'King\'s Indian Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 80,
                            'calm' => 45,
                            'playful' => 75
                        ]
                        ],
                    'TECHNICIAN' => [
                        'description' => 'Technicians are great at extracting the most from every position. Once they have a winning position, they rarely let it slip - combining great calculation and theoretical knowledge to bring home victory. Because of their methodical nature, Technicians are particularly in control of their emotions at the chessboard. In the rare case that they experience an unexpected defeat, they will calmly reset the pieces and begin a new game.',
                        'icon' => '♚',
                        'master' => 'Alireza Firouzja',
                        'openings' => ['Italian Opening', 'King\'s Indian Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 80,
                            'calm' => 45,
                            'playful' => 75
                        ]
                        ],
                    'WILDCARD' => [
                        'description' => 'Wildcards are unpredictable players who can adapt to any situation. They often surprise their opponents with unconventional strategies and are known for their ability to think outside the box.',
                        'icon' => '♟',
                        'master' => 'Alireza Firouzja',
                        'openings' => ['Italian Opening', 'King\'s Indian Defense'],
                        'traits' => [
                            'intuition' => 85,
                            'attacking' => 80,
                            'calm' => 45,
                            'playful' => 75
                        ]
                        ],
                ];

                foreach ($allPersonalities as $name => $data) {
                    $currentClass = ($name === $personality['name']) ? 'current' : '';
                    echo '<div class="personality-card ' . $currentClass . '">
                        <div class="personality-icon">' . $data['icon'] . '</div>
                        <div class="personality-title">' . $name . '</div>
                    </div>';
                }

        echo '</div>
                <a href="?reset=1" class="play-again">Play Again</a>
            </div>
        </body>
        </html>';
        exit;
    }
}

// Reset the game
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Display current level
$currentLevel = $_SESSION['level'];
$story = $levels[$currentLevel]['story'];
$choices = $levels[$currentLevel]['choices'];

function determinePersonality($playerStyle) {
    $total = array_sum($playerStyle);
    $aggressive_percent = ($playerStyle['aggressive'] / $total) * 100;
    $strategic_percent = ($playerStyle['strategic'] / $total) * 100;
    $defensive_percent = ($playerStyle['defensive'] / $total) * 100;

    // More detailed personality mappings
    if ($aggressive_percent > 80) {
        return ['name' => 'CAVEMAN', 'description' => 'What Cavemen lack in subtlety, they make up for in raw attacking power. Cavemen rarely have everything calculated to the end, but their intuition is strong, and once they have an attack underway, they seldom let their opponent\'s escape. Cavemen tend to be emotional, and when riding high, they are a force to be reckoned with. In contrast, when on tilt, they can struggle to regain their form.'];
    } 
    if ($strategic_percent > 80) {
        return ['name' => 'MASTERMIND', 'description' => 'Masterminds always see one step ahead. A Mastermind is constantly calculating, digging deep into the position to uncover opportunities to ensnare their opponents. Despite their methodical style of play, masterminds can be emotional, holding a grudge and occasionally going on tilt if they become obsessed with vanquishing their opponent.'];
    }
    if ($defensive_percent > 80) {
        return ['name' => 'TECHNICIAN', 'description' => 'Technicians are great at extracting the most from every position. Once they have a winning position, they rarely let it slip - combining great calculation and theoretical knowledge to bring home victory. Because of their methodical nature, Technicians are particularly in control of their emotions at the chessboard. In the rare case that they experience an unexpected defeat, they will calmly reset the pieces and begin a new game.'];
    }
    
    // High Aggressive + Strategic combinations
    if ($aggressive_percent > 35 && $strategic_percent > 35) {
        if ($aggressive_percent > $strategic_percent) {
            return ['name' => 'MAGICIAN', 'description' => 'Magicians know how to set the board on fire. With a bevvy of spells (tactics and combinations) at their command, magicians weave together incredible sequences. Despite their knowledge, magicians can still be fickle, letting their emotions guide their decision making in critical moments.'];
        } else {
            return ['name' => 'MAD SCIENTIST', 'description' => 'Mad Scientists are always cooking up something dangerous for their opponents. Because of their zany personalities, their opponents sometimes understimate their genius. Skilled in attacking play, they often see opportunities and ideas that less creative minds might miss. Their emotional nature might lead to errors at times, but they will always rebound soon with more dangerous ideas.'];
        }
    }
    
    // High Aggressive + Defensive combinations
    if ($aggressive_percent > 35 && $defensive_percent > 35) {
        if ($aggressive_percent > $defensive_percent) {
            return ['name' => 'ARTIST', 'description' => 'Artists have a great love of aesthetics and craftsmanship in chess. They rarely calculate lines to the end, preferring to let their intuition lead them in finding the moves that serve the needs of the position. Artists may not be very ordered students of the game, but they do love to study amazing games and combinations and have a wide knowledge of lovely patterns and ideas. Artists are particularly emotional and can experience waves of both ecstasy and despair as chess giveth and taketh away.'];
        } else {
            return ['name' => 'ASSASSIN', 'description' => 'Assassins are unflappable, meticulous pursuers of the opposing monarch. Once their attack is underway, the opponent rarely escapes. Whether attacking or defending, assassins are unphased by their opponent\'s threats and ideas. They know that if they wait, their opponent is bound to slip up, and victory will be theirs.'];
        }
    }
    
    // High Strategic + Defensive combinations
    if ($strategic_percent > 35 && $defensive_percent > 35) {
        if ($strategic_percent > $defensive_percent) {
            return ['name' => 'ANACONDA', 'description' => 'Anacondas love control. Where others seek fast-paced attacking wins, Anacondas like to savour their victories. They will often slowly squash their opponent in the endgame or patiently and inexorably build up an overwhelming middlegame position. Their style may sound dour, but they have a fun nature, and they derive a lot of joy from a powerful win secured with a high accuracy.'];
        } else {
            return ['name' => 'MACHINE', 'description' => 'Machines are relentless opponents, constantly exerting pressure and quickly seizing on errors from their opponents. Machines love to attack, but they are patient and unhurried in the attack, letting confidence and good calculation guide their pieces to the decisive squares. Machines are rarely emotional and aren\'t distracted by flashy moves - they focus on finding the best move in each and every position.'];
        }
    }

    // New conditions for Professor, Swindler, and Wildcard
    if ($defensive_percent > 50) {
        return ['name' => 'PROFESSOR', 'description' => 'Professors have a great sense of chess culture. They know many chess patterns and ideas, and they let their experience and natural understanding of the game guide them to the right moves. Professors are both great students of the game and great teachers. Rarely emotional, they handle their losses well, knowing it\'s all part of the game. In every loss, there\'s something to learn.'];
    }
    if ($aggressive_percent > 50) {
        return ['name' => 'SWINDLER', 'description' => 'Few have more fun at a chessboard than Swindlers. Whether winning or losing, Swindlers know that chess is a game of problems, and they are always creating knightmarish problems for their opponents to solve. Swindlers cherish best those games where they overcome a horrible position to secure an unexpected draw or even a win.'];
    }
    if ($strategic_percent > 50) {
        return ['name' => 'WILDCARD', 'description' => 'Wildcards are the rare chess players that can play in any style. When the mood strikes them, they might incline toward attacking or positional play. They don\'t study chess often, but they do have great intuition, and their ability to sense the right move should never be underestimated. Their emotions may guide their decisions just as much as their intuition - leading them to be sacrificial or greedy, aggressive or defensive, or tactical or methodical.'];
    }

    // Balanced combinations with slight leanings
    if ($aggressive_percent > 20 && $strategic_percent > 20 && $defensive_percent > 20) {
        if ($aggressive_percent > $strategic_percent && $aggressive_percent > $defensive_percent) {
            return ['name' => 'GRAPPLER', 'description' => 'Grapplers are the rare positional masters with a flair for entertainment. Suppressing their opponent\'s best ideas is the name of the game as they systematically gain the upper hands and seek to force submission. You will often see them trash talking while trading queens. When on a winning streak, Grapplers thrive, but if events turn against them, they can also struggle to re-establish their momentum and success.'];
        }
        if ($strategic_percent > $aggressive_percent && $strategic_percent > $defensive_percent) {
            return ['name' => 'INVENTOR', 'description' => 'Inventors like to forge new paths with a unique style that combines excellent calculation with powerful positional play. The method in their madness leads to creative ideas in seemingly simple positions. Inventors can handle their emotions well and tend to be confident. Though their style might seem dry at times, inventors find a great deal of joy in uncovering ideas in any position.'];
        }
        if ($defensive_percent > $aggressive_percent && $defensive_percent > $strategic_percent) {
            return ['name' => 'JESTER', 'description' => 'Jesters are always having fun. Chess is all just a big game to them, but don\'t let their playful nature fool you. They are always thinking, and they like to create lots of tricks, traps, and swindles to trip up their opponents. Win or lose, Jesters are fun to be around and create joy both on and off the board.'];
        }
    }

    

    // Default personality if no specific pattern is matched
    return ['name' => 'ROMANTIC', 'description' => 'Romantics are full of good ideas. The Romantic doesn\'t usually win by out-calculating their opponent, but rather they find some unexpected and unusual concept that the opponent didn\'t expect. Romantic players are very emotional and therefore can be distraught when they lose, but their moodiness also means that when things are going well, they can be unstoppably brilliant.'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Adventure Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #2f3136;  /* Dark gray background */
            color: white;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .game-container {
            background: #36393f;  /* Slightly lighter gray */
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            max-width: 600px;
            text-align: center;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        h1 {
            color: #4fd1c5;  /* Matching turquoise color */
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .choices-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin: 20px 0;
        }
        .choice {
            display: inline-block;
            padding: 10px 25px;
            background-color: #4fd1c5;
            color: #1e3c72;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .choice:hover {
            background-color: #38b2ac;  /* Darker turquoise */
            transform: scale(1.05);
        }
        .question-image {
            width: 100%;  /* Fill container width */
            max-width: 600px;  /* Maximum width */
            height: auto;  /* Maintain aspect ratio */
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            display: block;  /* Center the image */
        }
        
        .game-container {
            background: #36393f;
            padding: 40px;
            border-radius: 15px;
            max-width: 800px; /* Container width */
            text-align: center;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }

        /* Add some spacing between image and text */
        p {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="game-container">
        <h1>Chess Adventure - Level <?php echo $currentLevel; ?></h1>
        
        <!-- Add image here with error checking -->
        <?php 
        $imagePath = "images/question" . $currentLevel . ".jpg";
        if (file_exists($imagePath)) {
            echo '<img src="' . $imagePath . '" alt="Chess Position" class="question-image">';
        } else {
            echo '<p style="color: red;">Image not found: ' . $imagePath . '</p>';
        }
        ?>
        
        <p><?php echo $story; ?></p>
        <div class="choices-container">
            <?php foreach ($choices as $choiceText => $choiceValue): ?>
                <a href="?choice=<?php echo $choiceValue; ?>" class="choice"><?php echo $choiceText; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

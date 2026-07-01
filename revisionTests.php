<?php

return [
    'a1_beginner' => [
        [
            'id' => 9001,
            'title' => 'Revision',
            'questions' => [
                [
                    'type' => 'revision',
                    'title' => 'A1 Beginner Revision',
                    'label' => 'Revision',
                    'description' => 'Review the most important vocabulary, grammar, reading, writing, and speaking before the test.',
                    'sections' => [
                        [
                            'title' => 'Vocabulary',
                            'activities' => [
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'You cook food in the ........',
                                    'options' => ['bedroom', 'kitchen', 'garage', 'garden'],
                                    'correct_answer' => 1,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'Bread is in the ........ department.',
                                    'options' => ['bakery', 'dairy', 'produce', 'meat'],
                                    'correct_answer' => 0,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'I go to school ........ bus.',
                                    'options' => ['on', 'with', 'by', 'in'],
                                    'correct_answer' => 2,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'A person who drives a bus is a ........',
                                    'options' => ['passenger', 'conductor', 'customer', 'driver'],
                                    'correct_answer' => 3,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'A ........ of bread.',
                                    'options' => ['bottle', 'loaf', 'carton', 'bowl'],
                                    'correct_answer' => 1,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'A customer gets a ........ after paying.',
                                    'options' => ['receipt', 'ticket', 'passport', 'platform'],
                                    'correct_answer' => 0,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'The bank is ........ the supermarket.',
                                    'options' => ['delicious', 'opposite', 'expensive', 'quiet'],
                                    'correct_answer' => 1,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'I am looking for a blue ........',
                                    'options' => ['jacket', 'sink', 'station', 'receipt'],
                                    'correct_answer' => 0,
                                ],
                            ],
                        ],
                        [
                            'title' => 'Grammar',
                            'activities' => [
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'There ........ a sofa in the living room.',
                                    'options' => ['are', 'is', 'am', 'be'],
                                    'correct_answer' => 1,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'How ........ milk do you drink?',
                                    'options' => ['many', 'much', 'any', 'some'],
                                    'correct_answer' => 1,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'There are ........ apples on the table.',
                                    'options' => ['much', 'a lot', 'a lot of', 'any'],
                                    'correct_answer' => 2,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => '........ are these shoes?',
                                    'options' => ['How much', 'How many', 'What', 'Where'],
                                    'correct_answer' => 0,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'I go to work ........ foot.',
                                    'options' => ['with', 'in', 'by', 'on'],
                                    'correct_answer' => 3,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'Turn left ........ the park.',
                                    'options' => ['in', 'at', 'with', 'from'],
                                    'correct_answer' => 1,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => '........ jacket is black.',
                                    'options' => ['These', 'Those', 'This', 'They'],
                                    'correct_answer' => 2,
                                ],
                                [
                                    'type' => 'multiple_choice',
                                    'question' => 'The customer wants ........ medium jacket.',
                                    'options' => ['a', 'an', 'some', 'any'],
                                    'correct_answer' => 0,
                                ],
                            ],
                        ],
                        [
                            'title' => 'Missing Letters',
                            'activities' => [
                                [
                                    'type' => 'fill_blank_typing',
                                    'instruction' => 'Fill in the missing letters to complete the vocabulary words.',
                                    'items' => [
                                        ['before' => 'kitc', 'after' => 'en', 'answer' => 'h'],
                                        ['before' => 'rec', 'after' => 'ipt', 'answer' => 'e'],
                                        ['before' => 'supermar', 'after' => 'et', 'answer' => 'k'],
                                        ['before' => 'passeng', 'after' => 'r', 'answer' => 'e'],
                                        ['before' => 'bathr', 'after' => 'm', 'answer' => 'oo'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Complete the Dialogue',
                            'activities' => [
                                [
                                    'type' => 'word_bank_fill',
                                    'instruction' => 'Tap a word into the matching blank.',
                                    'bank' => ['medium', 'help', 'looking', 'card', 'receipt'],
                                    'answers' => ['help', 'looking', 'medium', 'card', 'receipt'],
                                    'template' => [
                                        ['speaker' => 'Salesperson', 'text' => 'Hello. Can I {blank} you?'],
                                        ['speaker' => 'Customer', 'text' => 'Yes, please. I am {blank} for a jacket.'],
                                        ['speaker' => 'Salesperson', 'text' => 'What size do you want?'],
                                        ['speaker' => 'Customer', 'text' => '{blank}, please.'],
                                        ['speaker' => 'Salesperson', 'text' => 'Will you pay by cash or {blank}?'],
                                        ['speaker' => 'Customer', 'text' => 'By card, please.'],
                                        ['speaker' => 'Salesperson', 'text' => 'Here is your {blank}.'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Reading Comprehension',
                            'activities' => [
                                [
                                    'type' => 'word_bank_fill',
                                    'instruction' => 'Read the email, then complete the notes.',
                                    'passage' => "About my family

Dear Yoko
Let me tell you about my family. I live with my mum, my dad and my big sister. We live in California. My mum's name is Carmen. She's Mexican and she speaks English and Spanish. She's a Spanish teacher. She's short and slim, she's got long, brown hair and brown eyes. My dad's name is David. He's American. He's tall and a little fat! He's got short brown hair and blue eyes. He works in a bank. My sister Shania is 14 and she loves listening to music. She listens to music all the time! She's got long brown hair and green eyes, like me. I've got long hair too. We've got a pet dog, Brandy. He's black and white and very friendly.
Write soon and tell me about your family.
Love
Kelly",
                                    'bank' => ['white', 'big', 'pet', 'short', 'Spanish', 'long'],
                                    'answers' => ['big', 'Spanish', 'short', 'long', 'pet', 'white'],
                                    'template' => [
                                        ['text' => 'Kelly lives with her mum, dad, and {blank} sister.'],
                                        ['text' => 'Her mum speaks English and {blank}.'],
                                        ['text' => 'Her mum is {blank} and slim.'],
                                        ['text' => 'Kelly has {blank} hair.'],
                                        ['text' => 'They have a {blank} dog.'],
                                        ['text' => 'The dog is black and {blank}.'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Writing Task',
                            'activities' => [
                                [
                                    'type' => 'writing_prompt',
                                    'question' => 'You are at a clothes shop looking for an item.',
                                    'prompt' => 'Ask about the price, the size, and the colour. You can use: "I am looking for a ...", "How much is ...?", and "I am looking for size ...".',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Speaking',
                            'activities' => [
                                [
                                    'type' => 'speaking_record',
                                    'question' => 'Record a one-minute audio about one topic.',
                                    'prompt' => 'Choose one: describe your house, describe your family members, or describe your daily routine.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => 9002,
            'title' => 'Test',
            'questions' => [
                [
                    'type' => 'test',
                    'title' => 'A1 Beginner Test',
                    'label' => 'Test',
                    'description' => 'Complete the final A1 Beginner test. Your answers stay on this page for now.',
                    'sections' => [
                        [
                            'title' => 'Grammar & Vocabulary',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => 'How do you formally greet someone in the morning?', 'options' => ['Hi!', 'Good morning.', 'Bye.', 'See you.'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'At the end of an interview, you say:', 'options' => ['Hello, nice to meet you.', 'Thank you for your time.', 'What is your name?', 'Where are you from?'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'This is ........ brother.', 'options' => ['my', 'I', 'me', 'he'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'Where can you borrow books?', 'options' => ['Bank', 'Library', 'Park', 'Supermarket'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'How do you ask for directions?', 'options' => ['Where is the bus stop?', 'What time is it?', 'How much is this?', 'Who is this?'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'The window is broken. I need to talk to the ........', 'options' => ['cashier', 'landlord', 'driver', 'firefighter'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'I am going to ........ money into my account.', 'options' => ['deposit', 'open', 'withdraw', 'take'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'The bank is ........ to the park.', 'options' => ['next', 'in', 'on', 'under'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'She ........ drinks coffee in the morning. (100%)', 'options' => ['never', 'sometimes', 'always', 'rarely'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'How much ........ this shirt?', 'options' => ['are', 'is', 'am', 'be'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'I ........ at 7:00 every day.', 'options' => ['wake up', 'wakes up', 'waking up', 'waken'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'Are you Egyptian? No, I ........', 'options' => ['are not', 'is not', 'am not', 'cannot'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => "My brother's son is my ........", 'options' => ['brother', 'cousin', 'nephew', 'niece'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'A room where you eat meals at a table is called ........', 'options' => ['kitchen', 'living room', 'dining room', 'bathroom'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'What ........ are you looking for? - Black.', 'options' => ['size', 'colour', 'item', 'price'], 'correct_answer' => 1],
                            ],
                        ],
                        [
                            'title' => 'Reading',
                            'activities' => [
                                [
                                    'type' => 'reading_choice',
                                    'passage' => 'Hello! My name is Maria. I am from Italy, so I am Italian. I live in a small apartment in the city with my family: my mother, father, and brother. Our home has a kitchen, a living room, and two bedrooms. The TV is on the table next to the sofa. Every day, I wake up at 6 AM, eat breakfast, and take the bus to work. Sometimes, I go to the supermarket after work to buy a loaf of bread and a pound of apples. Last week, the sink in the kitchen was broken, so I called the landlord. He fixed it. Now, I need to pay my electric bill at the bank. I am going to deposit money at the ATM tomorrow.',
                                    'question' => 'Where is Maria from?',
                                    'options' => ['Spain', 'Italy', 'France', 'Egypt'],
                                    'correct_answer' => 1,
                                ],
                                ['type' => 'reading_choice', 'question' => 'Who lives with Maria?', 'options' => ['Her friends', 'Her mother, father, and brother', 'Her sister', 'Alone'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'What does Maria do every day before work?', 'options' => ['Pays bills', 'Wakes up at 6 AM and eats breakfast', 'Goes to the park', 'Fixes the sink'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'What does Maria buy after work?', 'options' => ['A loaf of bread', 'A loaf of bread and a pound of apples', 'A carton of milk', 'A slice of meat'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'What is Maria going to do tomorrow?', 'options' => ['Call the landlord', 'Take the train', 'Deposit money at the ATM', 'Buy furniture'], 'correct_answer' => 2],
                            ],
                        ],
                        [
                            'title' => 'Listening',
                            'activities' => [
                                ['type' => 'audio_choice', 'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/175851/1.mp3', 'question' => 'What room is this person talking about?', 'options' => ['living room', 'kitchen', 'dining room']],
                                ['type' => 'audio_choice', 'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/175853/2.mp3', 'question' => 'What room is this person talking about?', 'options' => ['bedroom', 'kitchen', 'bathroom']],
                                ['type' => 'audio_choice', 'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/175855/3.mp3', 'question' => 'What room is this person talking about?', 'options' => ['bedroom', 'kitchen', 'living room']],
                                ['type' => 'audio_choice', 'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/175856/4.mp3', 'question' => 'What room is this person talking about?', 'options' => ['bathroom', 'bedroom', 'dining room']],
                                ['type' => 'audio_choice', 'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/175857/5.mp3', 'question' => 'What room is this person talking about?', 'options' => ['kitchen', 'living room', 'bathroom']],
                            ],
                        ],
                        [
                            'title' => 'Writing Assessment',
                            'activities' => [
                                ['type' => 'writing_prompt', 'question' => 'Write 5 complete sentences.', 'prompt' => 'Describe your house: the type of house, the number of rooms, and the furniture in the living room.'],
                            ],
                        ],
                        [
                            'title' => 'Speaking Assessment',
                            'activities' => [
                                ['type' => 'speaking_record', 'question' => 'Record a 1-minute audio response.', 'prompt' => 'Introduce yourself and describe your daily routine. Include your name, where you are from, your nationality, your family/home, and how you get to work.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'a1_intermediate' => [
        [
            'id' => 9101,
            'title' => 'Revision',
            'questions' => [
                [
                    'type' => 'revision',
                    'title' => 'A1 Intermediate Revision',
                    'label' => 'Revision',
                    'description' => 'Review A1 Intermediate before moving on.',
                    'sections' => [
                        [
                            'title' => 'Vocabulary',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => 'A planned activity where people or teams compete in physical games is a ........', 'options' => ['party', 'sports event', 'library', 'pharmacy'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'On birthdays, it is common to give someone a ........ kindly.', 'options' => ['gift', 'parade', 'ticket', 'stadium'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'The person who helps you find books in a school is the ........', 'options' => ['principal', 'librarian', 'pharmacist', 'travel agent'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'I have a terrible headache. I need to go to the ........', 'options' => ['gym', 'cafeteria', 'auditorium', 'pharmacy'], 'correct_answer' => 3],
                                ['type' => 'multiple_choice', 'question' => 'A short trip to a large town to enjoy culture and shopping is called a ........', 'options' => ['city break', 'beach holiday', 'camping trip', 'safari'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'At the airport check-in, you must put your heavy bag on the ........', 'options' => ['window seat', 'scale', 'boarding pass', 'aisle'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'At the security control, you need to take out your ........ and liquids.', 'options' => ['suitcase', 'laptop', 'seatbelt', 'tray table'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'If someone is not breathing or is hurt badly, it is an ........', 'options' => ['invitation', 'excursion', 'emergency', 'allergy'], 'correct_answer' => 2],
                            ],
                        ],
                        [
                            'title' => 'Grammar',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => 'You ........ pack your passport before you go to the airport.', 'options' => ['should', 'shouldn\'t', 'has to', 'are going'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => '........ I have a window seat, please?', 'options' => ['Am', 'Do', 'Can', 'Would'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'There ........ injured people in the car accident. Please call an ambulance!', 'options' => ['is', 'are', 'am', 'be'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => '........ you like playing basketball?', 'options' => ['Are', 'Do', 'Does', 'Is'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'I love football! I ........ watch the games on TV on the weekend.', 'options' => ['always', 'never', 'rarely', 'don\'t'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'When is your birthday? It is ........ May 15th.', 'options' => ['in', 'at', 'on', 'to'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'How about going to a movie? Sorry, I ........ I have to work.', 'options' => ['am not', 'can\'t', 'don\'t', 'won\'t'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'Next summer, we ........ to travel to Spain.', 'options' => ['going', 'are going', 'go', 'will going'], 'correct_answer' => 1],
                            ],
                        ],
                        [
                            'title' => 'Reading',
                            'passage' => "A Trip to Italy\n\nNext summer, Emma is going to travel to Rome, Italy for a city break holiday. She is very excited. She needs to pack her suitcase carefully. She should bring her sunglasses, a digital camera, and a comfortable pair of shoes because she is going to walk a lot. Her flight is on the 15th of June. She is going to travel by plane and she prefers a window seat so she can look at the sky during the journey. At the airport, she will go to the check-in desk first to show her passport and get her boarding pass. Then, she must go through security control. She knows she cannot take large bottles of liquid on the plane. She hopes to eat lots of delicious Italian food and visit famous museums when she arrives.",
                            'activities' => [
                                ['type' => 'reading_choice', 'question' => 'What type of holiday is Emma going on?', 'options' => ['A beach holiday', 'A safari', 'A city break', 'A camping trip'], 'correct_answer' => 2],
                                ['type' => 'reading_choice', 'question' => 'Why does Emma need comfortable shoes?', 'options' => ['Because she is going to the gym.', 'Because she is going to walk a lot.', 'Because she is playing basketball.', 'Because she has a foot allergy.'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'What kind of seat does Emma prefer on the plane?', 'options' => ['An aisle seat', 'A middle seat', 'A window seat', 'A front seat'], 'correct_answer' => 2],
                                ['type' => 'reading_choice', 'question' => 'When is her flight?', 'options' => ['June 5th', 'June 15th', 'July 15th', 'August 15th'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'What document does she need to show at the check-in desk?', 'options' => ['A ticket', 'A boarding pass', 'A passport', 'A receipt'], 'correct_answer' => 2],
                                ['type' => 'reading_choice', 'question' => 'What is one thing she is not allowed to take on the plane?', 'options' => ['Shoes', 'Sunglasses', 'A camera', 'Large bottles of liquid'], 'correct_answer' => 3],
                            ],
                        ],
                        [
                            'title' => 'Missing Letters',
                            'activities' => [
                                [
                                    'type' => 'fill_blank_typing',
                                    'instruction' => 'Fill in the missing letters to complete the vocabulary words.',
                                    'items' => [
                                        ['before' => 'f', 'after' => 'stival', 'answer' => 'e'],
                                        ['before' => 'passp', 'after' => 'rt', 'answer' => 'o'],
                                        ['before' => 'med', 'after' => 'cine', 'answer' => 'i'],
                                        ['before' => 'lu', 'after' => 'gage', 'answer' => 'g'],
                                        ['before' => 'pharma', 'after' => 'y', 'answer' => 'c'],
                                        ['before' => 'boar', 'after' => 'ing', 'answer' => 'd'],
                                        ['before' => 'hol', 'after' => 'day', 'answer' => 'i'],
                                        ['before' => 'emergen', 'after' => '', 'answer' => 'cy'],
                                        ['before' => 'invitati', 'after' => '', 'answer' => 'on'],
                                        ['before' => 'sec', 'after' => 'rity', 'answer' => 'u'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Listening',
                            'activities' => [
                                [
                                    'type' => 'word_bank_fill',
                                    'title' => 'Complete the dialogue',
                                    'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/191420/good-morning-where-are-you-flying-today_pl5PpsfM.mp3',
                                    'bank' => ['passport', 'luggage', 'suitcase', 'scale', 'aisle', 'boarding pass', 'gate', 'flight'],
                                    'answers' => ['passport', 'luggage', 'suitcase', 'scale', 'aisle', 'boarding pass', 'gate', 'flight'],
                                    'template' => [
                                        ['speaker' => 'Passenger', 'text' => 'Good morning. I\'m flying to Paris.'],
                                        ['speaker' => 'Agent', 'text' => 'Can I see your {blank} and ticket, please?'],
                                        ['speaker' => 'Passenger', 'text' => 'Sure. Here you go.'],
                                        ['speaker' => 'Agent', 'text' => 'Thank you. Are you checking in any {blank} today?'],
                                        ['speaker' => 'Passenger', 'text' => 'Yes, just one {blank}.'],
                                        ['speaker' => 'Agent', 'text' => 'Great. Please put it on the {blank}. Would you like a window seat or an {blank} seat?'],
                                        ['speaker' => 'Passenger', 'text' => 'An aisle seat, please.'],
                                        ['speaker' => 'Agent', 'text' => 'Okay. Here is your {blank}. Your {blank} number is 14. Boarding starts at 10:30. Have a good {blank}!'],
                                        ['speaker' => 'Passenger', 'text' => 'Thank you.'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Writing',
                            'activities' => [
                                ['type' => 'writing_prompt', 'question' => 'Write 6 to 8 sentences about your next holiday plan.', 'prompt' => 'Include where you are going, how you are going to travel, what you are going to pack, and what you are going to do there.'],
                            ],
                        ],
                        [
                            'title' => 'Speaking',
                            'activities' => [
                                ['type' => 'speaking_record', 'question' => 'Record a one-minute audio.', 'prompt' => 'You are at the pharmacy. Tell the pharmacist about a health issue.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => 9102,
            'title' => 'Test',
            'questions' => [
                [
                    'type' => 'test',
                    'title' => 'A1 Intermediate Test',
                    'label' => 'Test',
                    'description' => 'Show what you remember from A1 Intermediate.',
                    'sections' => [
                        [
                            'title' => 'Grammar & Vocabulary',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => 'I ........ karate every Friday.', 'options' => ['go', 'do', 'play'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'She is good ........ volleyball.', 'options' => ['in', 'with', 'at'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'Do you want to go to a match this Saturday? Yes, ........', 'options' => ['I\'d love to', 'Sorry, I can\'t', 'Maybe next time'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'I was born ........ March 1st.', 'options' => ['in', 'on', 'at'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'We usually wear a cap and gown at a ........', 'options' => ['birthday', 'wedding', 'graduation'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'You can go shopping in a ........', 'options' => ['beach holiday', 'cruise', 'city break'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'She ........ going to travel.', 'options' => ['isn\'t', 'am not', 'aren\'t'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'I\'m going to ........ a hotel.', 'options' => ['book', 'booked', 'booking'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'Can I have your ........ and ........?', 'options' => ['seat / boarding pass', 'hand luggage / passport', 'ticket / passport'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'How would you like to pay? ........ credit card.', 'options' => ['in', 'by', 'for'], 'correct_answer' => 1],
                            ],
                        ],
                        [
                            'title' => 'Listening',
                            'activities' => [
                                [
                                    'type' => 'word_bank_fill',
                                    'title' => 'Complete the dialogue',
                                    'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/176346/WhatTheMatter.mp3',
                                    'bank' => ['runny', 'matter', 'fever', 'should', 'allergies'],
                                    'answers' => ['matter', 'runny', 'fever', 'allergies', 'should'],
                                    'template' => [
                                        ['speaker' => 'Doctor', 'text' => 'What the {blank}, Mr Burke?'],
                                        ['speaker' => 'Patient', 'text' => 'I feel terrible. My body aches, I have a {blank} nose and a bad cough.'],
                                        ['speaker' => 'Doctor', 'text' => 'I see. Yes, your temperature is very high, too. You have a {blank}. It looks like you have the flu. Do you have any {blank}?'],
                                        ['speaker' => 'Patient', 'text' => 'I don\'t think so.'],
                                        ['speaker' => 'Doctor', 'text' => 'OK, great. I\'m going to prescribe some medicine. Please take it twice every day. You {blank} feel better in a few days.'],
                                        ['speaker' => 'Patient', 'text' => 'Great, thank you.'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Grammar 2',
                            'activities' => [
                                ['type' => 'unscramble_sentence', 'instruction' => 'Arrange the words to build the sentence.', 'words' => ['to', 'to', 'the', 'bank', 'I', 'go', 'going', 'am'], 'answer' => ['I', 'am', 'going', 'to', 'go', 'to', 'the', 'bank']],
                                ['type' => 'unscramble_sentence', 'instruction' => 'Arrange the words to build the sentence.', 'words' => ['blanket?', 'a', 'Can', 'have', 'I'], 'answer' => ['Can', 'I', 'have', 'a', 'blanket?']],
                                ['type' => 'unscramble_sentence', 'instruction' => 'Arrange the words to build the sentence.', 'words' => ['Passengers', 'can', 'suitcase', 'one', 'take'], 'answer' => ['Passengers', 'can', 'take', 'one', 'suitcase']],
                                ['type' => 'unscramble_sentence', 'instruction' => 'Arrange the words to build the sentence.', 'words' => ['where', 'me,', 'restroom?', 'is', 'the', 'Excuse'], 'answer' => ['Excuse', 'me,', 'where', 'is', 'the', 'restroom?']],
                                ['type' => 'unscramble_sentence', 'instruction' => 'Arrange the words to build the sentence.', 'words' => ['sports', 'I', 'am', 'a', 'big', 'not', 'fan', 'of'], 'answer' => ['I', 'am', 'not', 'a', 'big', 'fan', 'of', 'sports']],
                            ],
                        ],
                        [
                            'title' => 'Writing',
                            'activities' => [
                                ['type' => 'writing_prompt', 'question' => 'Write 5 to 6 sentences about your favourite sport.', 'prompt' => 'Include what sport it is, how often you watch or play it, where you watch or play it, and why you like it.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'a1_advanced' => [
        [
            'id' => 9201,
            'title' => 'Revision',
            'questions' => [
                [
                    'type' => 'revision',
                    'title' => 'A1 Advanced Revision',
                    'label' => 'Revision',
                    'description' => 'Review A1 Advanced before moving on.',
                    'sections' => [
                        [
                            'title' => 'Vocabulary',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => 'What does reservation mean?', 'options' => ['A hotel booking', 'A train ticket checker', 'A hotel bill'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'What is a receipt?', 'options' => ['A room key', 'A paper that shows payment', 'A taxi schedule'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'What is a platform?', 'options' => ['A place where you wait for a train', 'A hotel bedroom', 'A phone charger'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'Who is the cashier?', 'options' => ['The person who drives the bus', 'The person who takes payment', 'The person who cleans the room'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'What is a schedule?', 'options' => ['A list of times', 'A shopping bag', 'A fuel station'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'What does neighbourhood mean?', 'options' => ['A train journey', 'The area where you live', 'A hotel service'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'What can you buy at a pharmacy?', 'options' => ['Medicine', 'Train tickets', 'Phone data plans'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'What is a charger?', 'options' => ['A person at reception', 'A device that gives power to a phone', 'A paper with bus times'], 'correct_answer' => 1],
                            ],
                        ],
                        [
                            'title' => 'Grammar',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => '........ I have your passport, please?', 'options' => ['Could', 'Do', 'Am'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'Where ........ this bus go?', 'options' => ['do', 'does', 'is'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'Look! The man is ........ his car right now.', 'options' => ['wash', 'washes', 'washing'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'The deluxe room is ........ than the standard room.', 'options' => ['big', 'bigger', 'biggest'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'I would ........ to check out, please.', 'options' => ['like', 'want', 'need'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'How ........ is the taxi fare?', 'options' => ['many', 'much', 'cost'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'They ........ watching a movie at the cinema at the moment.', 'options' => ['am', 'is', 'are'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'This new phone is ........ expensive than my old phone.', 'options' => ['more', 'much', 'most'], 'correct_answer' => 0],
                            ],
                        ],
                        [
                            'title' => 'Matching Definitions',
                            'activities' => [
                                [
                                    'type' => 'matching_pairs',
                                    'instruction' => 'Match the words with the correct definition.',
                                    'choices' => ['Buffet car', 'Check-out', 'Platform', 'Fuel', 'Timetable', 'Sign', 'Reception', 'Data plan'],
                                    'answers' => [
                                        ['key' => 'A', 'text' => 'A mobile phone service that gives you internet access.'],
                                        ['key' => 'B', 'text' => 'The area at a train station where you get on the train.'],
                                        ['key' => 'C', 'text' => 'A list of departure and arrival times for buses or trains.'],
                                        ['key' => 'D', 'text' => 'Petrol or diesel for your car.'],
                                        ['key' => 'E', 'text' => 'A notice in public that gives information or rules.'],
                                        ['key' => 'F', 'text' => 'The front desk of a hotel where guests arrive.'],
                                        ['key' => 'G', 'text' => 'Leaving the hotel and paying your bill.'],
                                        ['key' => 'H', 'text' => 'A carriage on a train where you can buy food and drinks.'],
                                    ],
                                    'matches' => ['H', 'G', 'B', 'D', 'C', 'E', 'F', 'A'],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Listening',
                            'activities' => [
                                [
                                    'type' => 'word_bank_fill',
                                    'title' => 'Complete the dialogue',
                                    'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/191485/good-morning-how-may-i-help-you_M5tmwL1z.mp3',
                                    'bank' => ['charge', 'taxi', 'credit', 'check', 'lobby', 'moment', 'receipt', 'journey'],
                                    'answers' => ['check', 'moment', 'charge', 'credit', 'receipt', 'taxi', 'lobby', 'journey'],
                                    'template' => [
                                        ['speaker' => 'Receptionist', 'text' => 'Good morning. How may I help you?'],
                                        ['speaker' => 'Guest', 'text' => 'Hello. I\'d like to {blank} out, please. My room number is 312.'],
                                        ['speaker' => 'Receptionist', 'text' => 'Certainly. One {blank}, please. Here is your bill. Would you like to check if the amount is correct?'],
                                        ['speaker' => 'Guest', 'text' => 'Yes, thank you. What is this $15 {blank} for?'],
                                        ['speaker' => 'Receptionist', 'text' => 'That is for the minibar in your room.'],
                                        ['speaker' => 'Guest', 'text' => 'Oh, I see. Can I pay by {blank} card?'],
                                        ['speaker' => 'Receptionist', 'text' => 'Yes, of course. Here is your {blank}.'],
                                        ['speaker' => 'Guest', 'text' => 'Thank you. Could you arrange a {blank} to the airport for me?'],
                                        ['speaker' => 'Receptionist', 'text' => 'Sure. The taxi will be outside the {blank} in ten minutes.'],
                                        ['speaker' => 'Guest', 'text' => 'Perfect. Thank you for your help.'],
                                        ['speaker' => 'Receptionist', 'text' => 'You\'re welcome. Have a safe {blank}!'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Missing Letters',
                            'activities' => [
                                [
                                    'type' => 'fill_blank_typing',
                                    'instruction' => 'Fill in the missing letters to complete the words.',
                                    'items' => [
                                        ['before' => 'r', 'after' => 'servation', 'answer' => 'e'],
                                        ['before' => 'lu', 'after' => 'gage', 'answer' => 'g'],
                                        ['before' => 'passp', 'after' => 'rt', 'answer' => 'o'],
                                        ['before' => 'rec', 'after' => 'ipt', 'answer' => 'e'],
                                        ['before' => 'st', 'after' => 'tion', 'answer' => 'a'],
                                        ['before' => 'ca', 'after' => 'hier', 'answer' => 's'],
                                        ['before' => 'sm', 'after' => 'rtphone', 'answer' => 'a'],
                                        ['before' => 'n', 'after' => 'ighbourhood', 'answer' => 'e'],
                                        ['before' => 'b', 'after' => 'ttery', 'answer' => 'a'],
                                        ['before' => 'pl', 'after' => 'tform', 'answer' => 'a'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Reading',
                            'passage' => "My name is Sarah, and I live in a very quiet neighbourhood. It is a great place because there are many small shops and a beautiful park. Right now, people are walking their dogs in the park. Every morning, I take the bus to work. The bus schedule is very reliable. The bus stop is right next to the pharmacy.\n\nLast week, I bought a new cell phone at the tech shop downtown. It was more expensive than my old phone, but the battery life is much better and it has a lot of storage. After shopping, I took a taxi home. I asked the driver, \"How much is the fare?\" He said it was $15. I gave him a $20 bill and told him to keep the change. I really enjoy living in my city!",
                            'activities' => [
                                ['type' => 'reading_choice', 'question' => 'Where does Sarah live?', 'options' => ['In a hotel downtown', 'In a quiet neighbourhood', 'At the train station'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'What are people doing in the park right now?', 'options' => ['Waiting for the bus', 'Walking their dogs', 'Buying new phones'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'Where is the bus stop?', 'options' => ['Next to the park', 'Next to the pharmacy', 'Next to the tech shop'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'Why does Sarah like her new phone?', 'options' => ['It is cheaper than her old phone', 'The battery life is much better', 'It is very small'], 'correct_answer' => 1],
                                ['type' => 'reading_choice', 'question' => 'How much was the taxi fare?', 'options' => ['$15', '$20', '$5'], 'correct_answer' => 0],
                            ],
                        ],
                        [
                            'title' => 'Speaking',
                            'activities' => [
                                ['type' => 'speaking_record', 'question' => 'Record a one-minute audio.', 'prompt' => 'Choose one topic: your neighbourhood, a hotel stay, buying a phone, or a train journey.'],
                            ],
                        ],
                        [
                            'title' => 'Writing',
                            'activities' => [
                                ['type' => 'writing_prompt', 'question' => 'Write a short review about a hotel you stayed at.', 'prompt' => 'Write 6 to 8 sentences. Include where the hotel is located, the room, the staff service, one small problem, and your final opinion.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => 9202,
            'title' => 'Test',
            'questions' => [
                [
                    'type' => 'test',
                    'title' => 'A1 Advanced Test',
                    'label' => 'Test',
                    'description' => 'Show what you remember from A1 Advanced.',
                    'sections' => [
                        [
                            'title' => 'Vocabulary',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => 'A ........ is a place where you wait for a train.', 'options' => ['ticket machine', 'platform', 'entrance', 'luggage'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'A ........ call wakes you up in the morning.', 'options' => ['taxi', 'wake-up', 'service', 'room'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'Is breakfast ........ in the room price?', 'options' => ['included', 'upgraded', 'signed', 'checked'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'May I see your ........, please?', 'options' => ['receipt', 'change', 'passport', 'reservation'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'A place where you park cars is a ........', 'options' => ['parking lot', 'factory', 'bookstore', 'school'], 'correct_answer' => 0],
                                ['type' => 'multiple_choice', 'question' => 'My phone battery ........ quickly.', 'options' => ['grows', 'dies', 'fills', 'runs'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'Premium fuel is usually ........ than regular fuel.', 'options' => ['cheaper', 'bigger', 'more expensive', 'slower'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'You buy medicine at a ........', 'options' => ['supermarket', 'pharmacy', 'library', 'stadium'], 'correct_answer' => 1],
                            ],
                        ],
                        [
                            'title' => 'Grammar',
                            'activities' => [
                                ['type' => 'multiple_choice', 'question' => 'She ........ a taxi to the station every day in the morning.', 'options' => ['take', 'takes', 'taking', 'took'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'Traffic ........ not bad today.', 'options' => ['are', 'am', 'is', 'be'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => '........ much is the ride?', 'options' => ['What', 'How', 'Where', 'When'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'I\'d like ........ in, please.', 'options' => ['check', 'to check', 'checking', 'checked'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'There ........ a pool on the roof.', 'options' => ['are', 'is', 'am', 'be'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => '........ I have your name, please?', 'options' => ['Do', 'Am', 'May', 'Should'], 'correct_answer' => 2],
                                ['type' => 'multiple_choice', 'question' => 'There isn\'t ........ noise here.', 'options' => ['many', 'much', 'a few', 'some'], 'correct_answer' => 1],
                                ['type' => 'multiple_choice', 'question' => 'She ........ watching TV now.', 'options' => ['am', 'is', 'are', 'be'], 'correct_answer' => 1],
                            ],
                        ],
                        [
                            'title' => 'Reading',
                            'activities' => [
                                [
                                    'type' => 'word_bank_fill',
                                    'title' => 'Complete the dialogue',
                                    'bank' => ['train', 'platform', 'tickets', 'Excuse me', 'timetable'],
                                    'answers' => ['Excuse me', 'platform', 'train', 'tickets', 'timetable'],
                                    'template' => [
                                        ['speaker' => 'A', 'text' => '{blank}, is this the right {blank}?'],
                                        ['speaker' => 'B', 'text' => 'Yes, the {blank} leaves in 10 minutes.'],
                                        ['speaker' => 'A', 'text' => 'Great! Let\'s buy our {blank}.'],
                                        ['speaker' => 'B', 'text' => 'Good idea. Let\'s check the {blank}.'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Listening',
                            'activities' => [
                                [
                                    'type' => 'word_bank_fill',
                                    'title' => 'Complete the dialogue',
                                    'audio' => 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/178635/merged.mp3',
                                    'bank' => ['reservation', '312', '9:00', 'passport'],
                                    'answers' => ['reservation', 'passport', '312', '9:00'],
                                    'template' => [
                                        ['speaker' => 'Receptionist', 'text' => 'Good evening. How may I help you?'],
                                        ['speaker' => 'Guest', 'text' => 'I have a {blank}.'],
                                        ['speaker' => 'Receptionist', 'text' => 'May I have your {blank}, please?'],
                                        ['speaker' => 'Guest', 'text' => 'Here you are.'],
                                        ['speaker' => 'Receptionist', 'text' => 'You are in room {blank}. Breakfast is from 6:00 to {blank} a.m.'],
                                        ['speaker' => 'Guest', 'text' => 'Thank you.'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Vocabulary Matching',
                            'activities' => [
                                [
                                    'type' => 'matching_pairs',
                                    'instruction' => 'Match the word with its definition.',
                                    'choices' => ['Library', 'Restaurant', 'A registration form', 'Fire fighter', 'The fare'],
                                    'answers' => [
                                        ['key' => 'A', 'text' => 'A person who puts out fires.'],
                                        ['key' => 'B', 'text' => 'A place where you eat.'],
                                        ['key' => 'C', 'text' => 'A place where you read.'],
                                        ['key' => 'D', 'text' => 'The money you pay to ride.'],
                                        ['key' => 'E', 'text' => 'A paper you fill out with your details.'],
                                    ],
                                    'matches' => ['C', 'B', 'E', 'A', 'D'],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Grammar Correction',
                            'activities' => [
                                [
                                    'type' => 'fill_blank_typing',
                                    'instruction' => 'Correct the words in brackets.',
                                    'items' => [
                                        ['before' => 'She ', 'after' => ' watching TV.', 'answer' => 'is'],
                                        ['before' => 'They ', 'after' => ' playing outside.', 'answer' => 'are'],
                                        ['before' => 'He ', 'after' => ' a book now.', 'answer' => 'is reading'],
                                        ['before' => 'This phone is ', 'after' => ' than that one.', 'answer' => 'cheaper'],
                                        ['before' => 'I am ', 'after' => ' to the shop now.', 'answer' => 'going'],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Writing',
                            'activities' => [
                                ['type' => 'writing_prompt', 'question' => 'Write a short message to hotel reception.', 'prompt' => 'Write 5 to 6 sentences. Mention your room, the problem, what is not working, and ask for help.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];

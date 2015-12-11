#Advent of Code 2015 - TDD in PHP
---------------------------------

This repo contains (or will contain) examples of how to solve each of the 2015 Advent of Code challenges using PHP by following a TDD methodology using phpspec. You are welcome to use the code in any way you see fit, but the intention is for learning. 

To see each of the examples developed live, please see my youtube channel at https://www.youtube.com/user/dstockto

Due to the time required to record each video and since I didn't know about the project until day 7, it is likely this repo and the videos will be at least a few days behind.

To log in and try the Advent of Code, please go to [http://adventofcode.com/](http://adventofcode.com/). Thank you to Eric Wastl [@ericwastl](https://twitter.com/ericwastl) for creating this challenge.

## Design Decisions

The purpose of this repo and the examples is to help people learn TDD with PHP. That means that for each of the Advent days, the design of the code may not be the fastest, most efficient or the most clever. If the description of the problem sounds like a simulation of some sort, I'll likely be building a simulation even though it may take more memory or more time than an optimized procedural solution. For instance, the first puzzle for day 1 could be solved with a text editor's find functionality or with a couple of regular expressions.

## Initial Repository Contents

To start, the repo contains only composer.json, composer.lock and `runner.php`. The composer files are used to install phpspec and set up an autoloader so I don't need to write a bunch of `require_once` bits. The `runner.php` script will load a puzzle for a specific day and execute it. The solutions will output on the command line. Each day's classes will be namespaced with the day and the Puzzle1 and Puzzle2 classes will set up the classes and input and __invoke will result in the output. The runner script will execute this. Other than phpspec, I'm not planning on using any other frameworks or components, so the solutions will be plain PHP. 

If you end up following along and have any questions or comments, please feel free to open issues on github. I'll try to respond as quickly as I can.

## Videos

Day 1 Puzzle 1 - [https://www.youtube.com/watch?v=JzUnN_J3DVI](https://www.youtube.com/watch?v=JzUnN_J3DVI)  
Day 1 Puzzle 2 - [https://www.youtube.com/watch?v=7GEE781hCkk](https://www.youtube.com/watch?v=7GEE781hCkk)  

-- Music queries

/*
Display all the records.
Display only the songs.
Display the number, song, and artist for the first 10 songs
Display the hit numbers and song titles of the songs by Drake.
Display only the song titles with the word You in the title.
Display only the song titles that DO NOT have the word love in the song title.
Display all the table information in descending order of their number on the charts.
Display the song title and artist ordered by the artist and the song title in alphabetical order.
Display the first 10 artists only sorted by the the artist in alphabetical order.
Display all information for 10 hits sorted by song title alphabetically starting at 10.
*/

select * from `music`;
select `song` from `music`;
select `rank`, `song`, `artist` from `music` LIMIT 10;
select `rank`, `song` from `music` where `artist`="Drake";
select `song` from `music` where `song` like "%You%";
select `song` from `music` where `song` not like '%Love%';
select * from `music` order by `rank` desc;
select `song`, `artist` from `music` order by `artist`, `song`;
select `artist` from `music` order by `artist` limit 10;
select * from `music` order by `song`, `rank` limit 10, 10;

/*
Concatenate the first and last name in your userInfo table.
Find the length of each password.
Find the extension of each email.
Display the artist name in all caps.
Repeat the artists name of hit number 5 3 times.
Find the day of the month for record 3 in the userInfo table.
Find the monthName of all records in the userINfo table.
Display the current date.
Display the current time.
*/

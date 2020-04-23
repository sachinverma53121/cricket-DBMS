# cricket-DBMS
**It is a project to implement DBMS using mySQL and PHP**
```
> We can register teams
> Add players to registered teams
> Fix matches between registered Teams
> And view all these information stored in our Database using admin login
```

**create following database and run these files on your localhost server**
```
DATABASE NAME -> cricket-corp

CREATE TABLE admin (
    admin_email VARCHAR(255) NOT NULL,
    admin_name VARCHAR(255) NOT NULL,
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin VALUES ('sachinverma@tempmail.net','Sachin Verma','admin','admin');

CREATE TABLE country (
    country_code VARCHAR(255) PRIMARY KEY,
    country_name VARCHAR(255) UNIQUE
);

CREATE TABLE team (
    country_code VARCHAR(255) NOT NULL,
    team_name VARCHAR(255) PRIMARY KEY,
    FOREIGN KEY(country_code) REFERENCES country(country_code)
);    

CREATE TABLE player(
    jearsy_no INT NOT NULL,
    player_fname VARCHAR(255) NOT NULL,
    player_lname VARCHAR(255) NOT NULL,
    dob DATE NOT NULL CHECK (dob BETWEEN '1980-01-01' AND '2000-01-01'),
    team_name VARCHAR(255) NOT NULL,
    player_phone BIGINT ,
    CONSTRAINT pk_playerjearsy PRIMARY KEY (jearsy_no,team_name),
    FOREIGN KEY (team_name) REFERENCES team(team_name)
);     
    
CREATE TABLE coach (
    coach_id VARCHAR(255) PRIMARY KEY,
    coach_name VARCHAR(255) NOT NULL,
    team_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (team_name) REFERENCES team(team_name)
);    

CREATE TABLE manager (
    manager_name VARCHAR(255) NOT NULL,
    team_name VARCHAR(255) NOT NULL,
    CONSTRAINT pk_manager PRIMARY KEY (manager_name,team_name),
    FOREIGN KEY (team_name) REFERENCES team(team_name)
);

//because manager_phone number is multi valued attribute
CREATE TABLE managerphone (
    manager_name VARCHAR(255) NOT NULL,
    manager_phone BIGINT NOT NULL,
    FOREIGN KEY(manager_name) REFERENCES manager(manager_name) 
);    

CREATE TABLE matchh (
    match_no INT PRIMARY KEY,
    opposition VARCHAR(255),
    stadium_name VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    match_date DATE NOT NULL,
    match_time TIME NOT NULL
);    

CREATE TABLE teammatch (
    match_no INT NOT NULL,
    team_name VARCHAR(255) NOT NULL,
    FOREIGN KEY(match_no)REFERENCES maatchh(match_no),
    FOREIGN KEY(team_name) REFERENCES team(team_name) 
);
```
*You can use Xampp / Wampp to run them locally on your system and start creating database in your system*











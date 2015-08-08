CREATE TABLE btFootballClub (
id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL DEFAULT '',
                id_country smallint(4) unsigned NOT NULL,
                venue VARCHAR(100) DEFAULT NULL,
                coach VARCHAR(100) DEFAULT NULL,
                logo_big VARCHAR(255) DEFAULT NULL,
                logo_mini VARCHAR(255) DEFAULT NULL,
                creation VARCHAR(4) NOT NULL DEFAULT '0000',
                website VARCHAR(255) DEFAULT NULL,
                PRIMARY KEY (id),
                UNIQUE KEY name (name)
)

CREATE TABLE btFootballCountry (
    id tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
                name VARCHAR(100) DEFAULT NULL,
                PRIMARY KEY (id),
                UNIQUE KEY name (name))

CREATE TABLE btFootballFixture(
number tinyint(3) unsigned NOT NULL DEFAULT '0',
                scheduled date NOT NULL DEFAULT '0000-00-00',
                id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
                id_league smallint(5) unsigned NOT NULL DEFAULT '0',
                PRIMARY KEY (id),
                KEY id_league (id_league)
)

CREATE TABLE btFootballLeague (
id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
                name VARCHAR(100) NOT NULL DEFAULT '',
                year year(4) NOT NULL,
                pt_victory tinyint(3) unsigned NOT NULL DEFAULT '3',
                pt_draw tinyint(3) unsigned NOT NULL DEFAULT '1',
                pt_defeat tinyint(3) unsigned NOT NULL DEFAULT '0',
                promotion tinyint(3) unsigned NOT NULL DEFAULT '4',
                qualifying tinyint(3) unsigned NOT NULL DEFAULT '2',
                relegation tinyint(3) unsigned NOT NULL DEFAULT '3',
                id_favorite smallint(4) unsigned NOT NULL DEFAULT '0',
                nb_leg tinyint(1) NOT NULL DEFAULT '2',
                team_link ENUM('no','yes') NOT NULL DEFAULT 'no',
                default_time time NOT NULL DEFAULT '17:00:00',
                nb_teams tinyint(1) NOT NULL DEFAULT '0',
                player_mod ENUM('no','yes') NOT NULL DEFAULT 'no',
                sport_type VARCHAR(50) NOT NULL DEFAULT 'football',
                nb_starter TINYINT(1) unsigned NOT NULL DEFAULT '0',
                nb_bench TINYINT(1) unsigned NOT NULL DEFAULT '0',
                prediction_mod ENUM('no','yes') NOT NULL DEFAULT 'no',
                point_right TINYINT(1) unsigned NOT NULL DEFAULT '5',
                point_wrong TINYINT(1) unsigned NOT NULL DEFAULT '0',
                point_part TINYINT(1) unsigned NOT NULL DEFAULT '1',
                deadline TINYINT(1) unsigned NOT NULL DEFAULT '1',
                PRIMARY KEY (id)
                )

CREATE TABLE btFootballMatch (
id mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
                id_team_home smallint(5) unsigned DEFAULT NULL,
                id_team_away smallint(5) unsigned DEFAULT NULL,
                played datetime DEFAULT NULL,
                id_fixture smallint(5) unsigned DEFAULT NULL,
                goal_home tinyint(1) unsigned DEFAULT NULL,
                goal_away tinyint(1) unsigned DEFAULT NULL,
                PRIMARY KEY (id),
                KEY id_fixture (id_fixture),
                KEY id_team_away (id_team_away),
                KEY id_team_home (id_team_home)
)

CREATE TABLE btFootballCache(
club_name VARCHAR(255) DEFAULT NULL,
                points smallint(4) unsigned DEFAULT NULL,
                played tinyint(3) unsigned DEFAULT NULL,
                victory tinyint(3) unsigned DEFAULT NULL,
                draw tinyint(3) unsigned DEFAULT NULL,
                defeat tinyint(3) unsigned DEFAULT NULL,
                goal_for smallint(4) unsigned DEFAULT NULL,
                goal_against smallint(4) unsigned DEFAULT NULL,
                diff smallint(4) DEFAULT NULL,
                pen tinyint(2) DEFAULT NULL,
                home_points smallint(4) unsigned DEFAULT NULL,
                home_played tinyint(3) unsigned DEFAULT NULL,
                home_v tinyint(3) unsigned DEFAULT NULL,
                home_d tinyint(3) unsigned DEFAULT NULL,
                home_l tinyint(3) unsigned DEFAULT NULL,
                home_g_for smallint(4) unsigned DEFAULT NULL,
                home_g_against smallint(4) unsigned DEFAULT NULL,
                home_diff smallint(4) DEFAULT NULL,
                away_points smallint(4) unsigned DEFAULT NULL,
                away_played tinyint(3) unsigned DEFAULT NULL,
                away_v tinyint(3) unsigned DEFAULT NULL,
                away_d tinyint(3) unsigned DEFAULT NULL,
                away_l tinyint(3) unsigned DEFAULT NULL,
                away_g_for smallint(4) unsigned DEFAULT NULL,
                away_g_against smallint(4) unsigned DEFAULT NULL,
                away_diff tinyint(4) DEFAULT NULL,
                id_team smallint(5) unsigned NOT NULL DEFAULT '0',
                id_league smallint(5) unsigned NOT NULL DEFAULT '0',
                KEY id_league (id_league)
)

CREATE TABLE btFootballPlayer(
id smallint(6) unsigned NOT NULL AUTO_INCREMENT,
                firstname varchar(100) NOT NULL DEFAULT '',
                lastname varchar(100) NOT NULL DEFAULT '',
                description text,
                birthdate date NOT NULL DEFAULT '0000-00-00',
                weight tinyint(1) unsigned NOT NULL DEFAULT '0',
                height tinyint(1) unsigned NOT NULL DEFAULT '0',
                picture varchar(255) NOT NULL DEFAULT '',
                id_country tinyint(1) unsigned NOT NULL DEFAULT '0',
                id_term smallint(6) unsigned NOT NULL DEFAULT '0',
                PRIMARY KEY (id)
);

CREATE TABLE btFootballPlayerData(
id_event tinyint(1) unsigned NOT NULL DEFAULT '0',
                id_player_team smallint(4) unsigned NOT NULL DEFAULT '0',
                id_match smallint(4) unsigned NOT NULL DEFAULT '0',
                value tinyint(1) unsigned NOT NULL DEFAULT '0',
                KEY id_match (id_match),
                KEY id_event (id_event),
                KEY id_player_team (id_player_team)
);

CREATE TABLE btFootballPlayerTeam(
id smallint(4) unsigned NOT NULL AUTO_INCREMENT,
                id_player smallint(4) unsigned NOT NULL DEFAULT '0',
                id_team smallint(4) unsigned NOT NULL DEFAULT '0',
                number tinyint(1) unsigned NOT NULL DEFAULT '0',
                position tinyint(1) unsigned NOT NULL DEFAULT '0',
                PRIMARY KEY (id),
                KEY id_player (id_player),
                KEY id_team (id_team)
);

CREATE TABLE btFootballCharts(
id_team mediumint(5) unsigned NOT NULL DEFAULT '0',
                fixture tinyint(1) unsigned NOT NULL DEFAULT '0',
                ranking tinyint(1) unsigned NOT NULL DEFAULT '0',
                KEY id_team (id_team)
)
CREATE TABLE btFootballPrediction(
id_league smallint(3) unsigned NOT NULL DEFAULT '0',
                id_member smallint(3) unsigned NOT NULL DEFAULT '0',
                points smallint(3) unsigned NOT NULL DEFAULT '0',
                participation smallint(3) unsigned NOT NULL DEFAULT '0',
                KEY id_league (id_league),
                KEY id_member (id_member)
);
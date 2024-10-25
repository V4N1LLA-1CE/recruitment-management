DROP DATABASE IF EXISTS `a5_db`;
CREATE DATABASE `a5_db`;
USE `a5_db`;

CREATE TABLE `users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `email` varchar(255),
  `password` varchar(96)
);

CREATE TABLE `contractors` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `phone_number` varchar(10),
  `contractor_email` varchar(255)
);

CREATE TABLE `projects` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `project_name` varchar(255),
  `description` text,
  `management_tool_link` varchar(255),
  `project_due_date` datetime,
  `last_checked` datetime,
  `complete` boolean,
  `contractor_id` integer,
  `organisation_id` integer
);

CREATE TABLE `organisations` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `business_name` varchar(255),
  `contact_first_name` varchar(255),
  `contact_last_name` varchar(255),
  `contact_email` varchar(255),
  `current_website` varchar(255),
  `industry` text
);

CREATE TABLE `contacts` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `email` varchar(255),
  `phone_number` varchar(10),
  `message` text,
  `organisation_id` integer,
  `contractor_id` integer
);

CREATE TABLE `skills` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `skill_name` text
);

CREATE TABLE `contractors_skills` (
  `contractor_id` integer NOT NULL,
  `skill_id` integer NOT NULL,
  PRIMARY KEY (`contractor_id`, `skill_id`)
);

CREATE TABLE `projects_skills` (
  `project_id` integer NOT NULL,
  `skill_id` integer NOT NULL,
  PRIMARY KEY (`project_id`, `skill_id`)
);

-- Adding foreign keys
ALTER TABLE `projects`
  ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`),
  ADD FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`);

ALTER TABLE `contacts`
  ADD FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`),
  ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);

ALTER TABLE `contractors_skills`
  ADD FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);

ALTER TABLE `projects_skills`
  ADD FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

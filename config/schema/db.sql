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
  `contractor_email` varchar(255),
  `skillset_id` integer
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
  `skill_name` text,
  `project_id` integer
);

CREATE TABLE `contractors_skills` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `skill_id` integer
);

ALTER TABLE `projects` ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);

ALTER TABLE `projects` ADD FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`);

ALTER TABLE `contacts` ADD FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`);

ALTER TABLE `contacts` ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`);

ALTER TABLE `skills` ADD FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

ALTER TABLE `skills` ADD FOREIGN KEY (`id`) REFERENCES `contractors_skills` (`skill_id`);

ALTER TABLE `contractors` ADD FOREIGN KEY (`skillset_id`) REFERENCES `contractors_skills` (`id`);

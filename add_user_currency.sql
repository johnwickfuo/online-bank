-- Add per-user currency preference to the users table.
-- Run this against the database after deploying the multi-currency feature.

ALTER TABLE `users`
    ADD COLUMN `currency` VARCHAR(10) DEFAULT NULL AFTER `country`;

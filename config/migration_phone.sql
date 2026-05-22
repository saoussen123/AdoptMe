-- ============================================================
-- Migration: Add phone + reset token columns to users table
-- Run this in phpMyAdmin if your database is already created
-- ============================================================

USE adopt_me;

-- Add phone column (optional, nullable)
ALTER TABLE users
    ADD COLUMN IF NOT EXISTS phone VARCHAR(30) DEFAULT NULL AFTER password;

-- Add reset token columns for forgot-password flow
ALTER TABLE users
    ADD COLUMN IF NOT EXISTS reset_token VARCHAR(100) DEFAULT NULL AFTER phone,
    ADD COLUMN IF NOT EXISTS token_expires DATETIME DEFAULT NULL AFTER reset_token;

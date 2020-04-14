-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 14, 2020 at 12:17 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wastebin`
--

-- --------------------------------------------------------

--
-- Table structure for table `LANGUAGES`
--

CREATE TABLE `LANGUAGES` (
  `DISPLAY_NAME` varchar(12) DEFAULT NULL,
  `NAME` varchar(12) DEFAULT NULL,
  `COMMON` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `LANGUAGES`
--

INSERT INTO `LANGUAGES` (`DISPLAY_NAME`, `NAME`, `COMMON`) VALUES
('ABAP', 'abap', 'FALSE'),
('ABC', 'abc', 'FALSE'),
('ActionScript', 'actionscript', 'FALSE'),
('ADA', 'ada', 'FALSE'),
('Apache_Conf', 'apache_conf', 'FALSE'),
('AsciiDoc', 'asciidoc', 'FALSE'),
('Assembly_x86', 'assembly_x86', 'FALSE'),
('AutoHotKey', 'autohotkey', 'FALSE'),
('BatchFile', 'batchfile', 'FALSE'),
('C9Search', 'c9search', 'FALSE'),
('C_Cpp', 'c_cpp', 'FALSE'),
('Cirru', 'cirru', 'FALSE'),
('Clojure', 'clojure', 'FALSE'),
('Cobol', 'cobol', 'FALSE'),
('coffee', 'coffee', 'FALSE'),
('ColdFusion', 'coldfusion', 'FALSE'),
('CSharp', 'csharp', 'TRUE'),
('CSS', 'css', 'TRUE'),
('Curly', 'curly', 'FALSE'),
('D', 'd', 'FALSE'),
('Dart', 'dart', 'FALSE'),
('Diff', 'diff', 'FALSE'),
('Dockerfile', 'dockerfile', 'FALSE'),
('Dot', 'dot', 'FALSE'),
('Dummy', 'dummy', 'FALSE'),
('DummySyntax', 'dummysyntax', 'FALSE'),
('Eiffel', 'eiffel', 'FALSE'),
('EJS', 'ejs', 'FALSE'),
('Elixir', 'elixir', 'FALSE'),
('Elm', 'elm', 'FALSE'),
('Erlang', 'erlang', 'FALSE'),
('Forth', 'forth', 'FALSE'),
('FTL', 'ftl', 'FALSE'),
('Gcode', 'gcode', 'FALSE'),
('Gherkin', 'gherkin', 'FALSE'),
('Gitignore', 'gitignore', 'FALSE'),
('Glsl', 'glsl', 'FALSE'),
('golang', 'golang', 'TRUE'),
('Groovy', 'groovy', 'FALSE'),
('HAML', 'haml', 'FALSE'),
('Handlebars', 'handlebars', 'FALSE'),
('Haskell', 'haskell', 'FALSE'),
('haXe', 'haxe', 'FALSE'),
('HTML', 'html', 'TRUE'),
('HTML_Ruby', 'html_ruby', 'FALSE'),
('INI', 'ini', 'FALSE'),
('Io', 'io', 'FALSE'),
('Jack', 'jack', 'FALSE'),
('Jade', 'jade', 'FALSE'),
('Java', 'java', 'TRUE'),
('JavaScript', 'javascript', 'TRUE'),
('JSON', 'json', 'FALSE'),
('JSONiq', 'jsoniq', 'FALSE'),
('JSP', 'jsp', 'FALSE'),
('JSX', 'jsx', 'FALSE'),
('Julia', 'julia', 'FALSE'),
('LaTeX', 'latex', 'FALSE'),
('LESS', 'less', 'FALSE'),
('Liquid', 'liquid', 'FALSE'),
('Lisp', 'lisp', 'FALSE'),
('LiveScript', 'livescript', 'FALSE'),
('LogiQL', 'logiql', 'FALSE'),
('LSL', 'lsl', 'FALSE'),
('Lua', 'lua', 'FALSE'),
('LuaPage', 'luapage', 'FALSE'),
('Lucene', 'lucene', 'FALSE'),
('Makefile', 'makefile', 'FALSE'),
('Markdown', 'markdown', 'TRUE'),
('Mask', 'mask', 'FALSE'),
('MATLAB', 'matlab', 'FALSE'),
('MEL', 'mel', 'FALSE'),
('MUSHCode', 'mushcode', 'FALSE'),
('MySQL', 'mysql', 'FALSE'),
('BASH', 'nix', 'TRUE'),
('ObjectiveC', 'objectivec', 'FALSE'),
('OCaml', 'ocaml', 'FALSE'),
('Pascal', 'pascal', 'FALSE'),
('Perl', 'perl', 'TRUE'),
('pgSQL', 'pgsql', 'FALSE'),
('PHP', 'php', 'TRUE'),
('Powershell', 'powershell', 'TRUE'),
('Praat', 'praat', 'FALSE'),
('Prolog', 'prolog', 'FALSE'),
('Properties', 'properties', 'FALSE'),
('Protobuf', 'protobuf', 'FALSE'),
('Python', 'python', 'TRUE'),
('R', 'r', 'FALSE'),
('RDoc', 'rdoc', 'FALSE'),
('RHTML', 'rhtml', 'FALSE'),
('Ruby', 'ruby', 'TRUE'),
('Rust', 'rust', 'FALSE'),
('SASS', 'sass', 'FALSE'),
('SCAD', 'scad', 'FALSE'),
('Scala', 'scala', 'FALSE'),
('Scheme', 'scheme', 'FALSE'),
('SCSS', 'scss', 'FALSE'),
('SH', 'sh', 'FALSE'),
('SJS', 'sjs', 'FALSE'),
('Smarty', 'smarty', 'FALSE'),
('snippets', 'snippets', 'FALSE'),
('Soy_Template', 'soy_template', 'FALSE'),
('Space', 'space', 'FALSE'),
('SQL', 'sql', 'FALSE'),
('Stylus', 'stylus', 'FALSE'),
('SVG', 'svg', 'FALSE'),
('Tcl', 'tcl', 'FALSE'),
('Tex', 'tex', 'FALSE'),
('Text', 'text', 'TRUE'),
('Textile', 'textile', 'FALSE'),
('Toml', 'toml', 'FALSE'),
('Twig', 'twig', 'FALSE'),
('Typescript', 'typescript', 'FALSE'),
('Vala', 'vala', 'FALSE'),
('VBScript', 'vbscript', 'FALSE'),
('Velocity', 'velocity', 'FALSE'),
('Verilog', 'verilog', 'FALSE'),
('VHDL', 'vhdl', 'FALSE'),
('XML', 'xml', 'TRUE'),
('XQuery', 'xquery', 'FALSE'),
('YAML', 'yaml', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `PASTES`
--

CREATE TABLE `PASTES` (
  `id` smallint DEFAULT NULL,
  `PASTE_ID` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LANGUAGE` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `THEME` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PASSWORD` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SALT` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CODE` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `SUBMIT_TIME` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EXPIRE_TIME` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `THEMES`
--

CREATE TABLE `THEMES` (
  `DISPLAY_NAME` varchar(21) DEFAULT NULL,
  `NAME` varchar(23) DEFAULT NULL,
  `LIGHT_DARK` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `THEMES`
--

INSERT INTO `THEMES` (`DISPLAY_NAME`, `NAME`, `LIGHT_DARK`) VALUES
('Chaos', 'chaos', 'dark'),
('Clouds Midnight', 'clouds_midnight', 'dark'),
('Dracula', 'dracula', 'dark'),
('Cobalt', 'cobalt', 'dark'),
('Gruvbox', 'gruvbox', 'dark'),
('Green on Black', 'gob', 'dark'),
('Idle Fingers', 'idle_fingers', 'dark'),
('KrTheme', 'kr_theme', 'dark'),
('Merbivore', 'merbivore', 'dark'),
('Merbivore Soft', 'merbivore_soft', 'dark'),
('Mono Industrial', 'mono_industrial', 'dark'),
('Monokai', 'monokai', 'dark'),
('Pastel on Dark', 'pastel_on_dark', 'dark'),
('Solarized Dark', 'solarized_dark', 'dark'),
('Terminal', 'terminal', 'dark'),
('Tomorrow Night', 'tomorrow_night', 'dark'),
('Tomorrow Night Blue', 'tomorrow_night_blue', 'dark'),
('Tomorrow Night Bright', 'tomorrow_night_bright', 'dark'),
('Tomorrow Night 80s', 'tomorrow_night_eighties', 'dark'),
('Twilight', 'twilight', 'dark'),
('Vibrant Ink', 'vibrant_ink', 'dark'),
('Chrome', 'chrome', 'light'),
('Clouds', 'clouds', 'light'),
('Crimson Editor', 'crimson_editor', 'light'),
('Dreamweaver', 'dreamweaver', 'light'),
('GitHub', 'github', 'light'),
('IPlastic', 'iplastic', 'light'),
('Solarized Light', 'solarized_light', 'light'),
('TextMate', 'textmate', 'light'),
('Tomorrow', 'tomorrow', 'light'),
('XCode', 'xcode', 'light'),
('Kuroir', 'kuroir', 'light'),
('KatzenMilch', 'katzenmilch', 'light'),
('SQL Server', 'sqlserver', 'light');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

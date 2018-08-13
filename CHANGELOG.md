# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [0.1.2] - 2018-08-13
### Fixed
- Fixed sticky sidebar issue when `short_open_tag` is disabled  
  (it's disabled by default in php but enabled in the wordpress docker image)

## [0.1.1] - 2018-08-12
### Fixed
- Fixed sticky sidebar issues on small devices

## [0.1.0] - 2018-08-12
### Added
- Added Sticky Sidebar

## [0.0.4] - 2018-08-12
### Fixed
- Fixed headline layout bug
    - Preceding links was not clickable anymore
    - Sequencing headlines collapsed to one line if enough space was available
- Fixes issue that the collapsed header template sometime doesn't show the sticky header

### Added
- Added social media meta tags (with hard coded values) #1

## [0.0.3] - 2018-08-09
### Added
- Added new page template "Collapsed Header" which automatically scrolls down to the page content

### Fixed
- Footer navigation columns now have 100% width on small devices
- Fixed some spaces in sidebar on small devices
- Fixed scroll position when link to a headline anchor

## [0.0.2] - 2018-08-02
### Fixed
- Removed debugging output in topics widget

## [0.0.1] - 2018-08-02
- Initial implementation

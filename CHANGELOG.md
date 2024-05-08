CHANGELOG
=========
## 1.2.2403070 - 2024-03-07
-----
### Added
- Add Ecpg binding card examples.
## 1.2.2301023 - 2023-10-23
-----
### Added
- Add BNPL payment example
- Add TWQR payment example
## 1.2.2308100 - 2023-08-21
-----
### Added
- Add Ecpg payment example
## 1.2.2308010 - 2023-08-01
-----
### Added
- Add an annotation for $_POST parameter in GetCheckoutResponse.php
## 1.2.2210310 - 2022-10-31
-----

### Fixed
- Fix CheckMacValue verify failed when ItemName contains plus(+) sign.

## 1.2.0 - 2022-01-26
-----

### Fixed
- Fix PHP 5.6 compibility.
- Fix exmaple/Logistics/CrossBorder/Map.php using wrong service class.

### Added
- Add support for Ecpay `All in one logistics` API.
- Add TransCode validation(TransException).
- Add Unimart and Hilife freeze delivery return examples.

## 1.1.0 - 2021-07-26
-----

### Fixed
- Added AES decrypt and JSON decode result checking

### Added
- Added support for Ecpay `B2C invoice` API
- Added support for Ecpay `C2C invoice` API
- Follow the [Semantic Versioning](https://semver.org)

## 1.0.2106040 - 2021-07-19
-----

 ### Fixed
 - Added JSON responses format checking

 ### Deprecated
 - Marked `Ecpay\Sdk\Factories\Factory::createWithHash` as deprecated (it's still there, just not the
  recommended way) and remove from examples.

 ### Added
 - Added support for Ecpay `domestic logistics` API
 - Added `MD5` CheckMacValue
 - Added `curl POST with CheckMacValue and parse string reponse without CheckMacValue`


## 1.0.2011250 - 2020-12-24
-----

 ### Added
 - Added support for Ecpay `payment` API
 - Added support for Ecpay `cross-border logistics` API
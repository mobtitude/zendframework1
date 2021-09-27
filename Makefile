.DEFAULT_GOAL = help

.PHONY: help
help:
	@echo
	@echo "Wywołanie: make [akcja]"
	@echo
	@echo "Testy aplikacji:"
	@echo
	@echo "* code-check-php        - sprawdza jakość kodu PHP"
	@echo "* code-fix-php          - naprawia błędy w kodzie PHP które mogą być naprawione automatycznie"
	@echo

#
# ---- Testy aplikacji  ----
#

.PHONY: code-check-php
code-check-php:
	@echo "* code-check-php"
	@docker-compose -f ./configs/docker/code-quality.yml run --rm php-qa ./bin/ci-code-quality-php.sh

.PHONY: code-fix-php
code-fix-php:
	@echo "* code-fix-php"
	@docker-compose -f ./configs/docker/code-quality.yml run --rm php-qa ./bin/ci-code-fix-php.sh

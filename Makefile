.DEFAULT_GOAL = help

.PHONY: help
help:
	@echo
	@echo "Execution: make [action]"
	@echo
	@echo "Application tests:"
	@echo
	@echo "* code-check-php        - check PHP code quality"
	@echo "* code-fix-php          - fix PHP code, which can be fixed automatically"
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

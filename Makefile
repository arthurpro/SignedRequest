# Default task
all: install

# Install dependencies
install:
	@composer install --dev

# Run test suite
tests:
	@./vendor/bin/phpunit

# Run the unit tests with code coverage reports
tests-unit-coverage:
	@./vendor/bin/phpunit --testsuite unit --coverage-text --coverage-html ./.report

# API Documentation

This documentation provides information about the endpoints available in your Laravel application.

## Authentication

Before using certain endpoints, you may need to authenticate. Authentication is typically handled via tokens, sessions, or other mechanisms. Refer to your authentication documentation for details.

## Endpoints

### GET|HEAD /

**Description**: Retrieve homepage content.

### POST /_ignition/execute-solution

**Description**: Execute a solution (internal use).

### GET|HEAD /_ignition/health-check

**Description**: Health check endpoint (internal use).

### POST /_ignition/update-config

**Description**: Update configuration (internal use).

### POST /api/shorten-url

**Description**: Shorten a URL.

- **Parameters**:
  - `original_url` (string): The original URL to be shortened.

### GET|HEAD /api/shortened-urls

**Description**: Get a list of shortened URLs.

### GET|HEAD /api/user

**Description**: Retrieve user information (authentication required).

### GET|HEAD /sanctum/csrf-cookie

**Description**: Retrieve a CSRF cookie (for authentication).

### GET|HEAD /urls/list

**Description**: Retrieve a list of URLs (authentication required).

### GET|HEAD /{short_url}

**Description**: Redirect to the original URL associated with the short URL.

## Error Handling

Errors are returned with appropriate HTTP status codes and error messages in JSON format. Refer to each endpoint's response for error details.

## Versioning

This documentation is based on the current version of the API. Future versions may introduce changes. Always refer to the latest documentation for accurate information.


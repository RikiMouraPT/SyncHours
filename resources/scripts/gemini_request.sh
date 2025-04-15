#!/bin/bash
set -e -E

GEMINI_API_KEY="$GEMINI_API_KEY"
MODEL_ID="gemini-2.0-flash"
GENERATE_CONTENT_API="streamGenerateContent"
USER_INPUT="$1"

cat << EOF > request.json
{
    "contents": [
      {
        "role": "user",
        "parts": [
          {
            "text": "${USER_INPUT}"
          },
        ]
      },
    ],
    "generationConfig": {
      "responseMimeType": "text/plain",
    },
}
EOF

curl \
-X POST \
-H "Content-Type: application/json" \
"https://generativelanguage.googleapis.com/v1beta/models/${MODEL_ID}:${GENERATE_CONTENT_API}?key=${GEMINI_API_KEY}" -d '@request.json'
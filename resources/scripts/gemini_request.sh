#!/bin/bash
set -e -E

USER_INPUT="$1"
GEMINI_API_KEY="$GEMINI_API_KEY"
MODEL_ID="gemini-2.0-flash"
GENERATE_CONTENT_API="streamGenerateContent"

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
    "systemInstruction": {
      "parts": [
        {
            "text": "Com base nos json fornecidos, cria um plano de estudos para cada userExam, e distribui de forma eficaz por cada dia, tendo em conta o userConfig. O plano de estudos deve ser claro e conciso. "
        },
      ]
    },
    "generationConfig": {
      "responseMimeType": "application/json",
      "responseSchema": {
          "type": "object",
          "properties": {
            "response": {
              "type": "string",
              "example": "{\"userPlan\":{\"monday\":[{\"exam\":\"Teste 1\",\"start\":\"08:00\",\"end\":\"09:00\"},{\"exam\":\"teste 1\",\"start\":\"09:00\",\"end\":\"10:00\"},{\"exam\":\"teste 2\",\"start\":\"12:00\",\"end\":\"13:00\"},{\"exam\":\"teste 9\",\"start\":\"14:00\",\"end\":\"15:00\"}],\"tuesday\":[],\"wednesday\":[],\"thursday\":[{\"exam\":\"teste 4\",\"start\":\"16:00\",\"end\":\"17:00\"}],\"friday\":[],\"saturday\":[],\"sunday\":[]}}"
            }
          }
        },
    },
}
EOF

curl \
-X POST \
-H "Content-Type: application/json" \
"https://generativelanguage.googleapis.com/v1beta/models/${MODEL_ID}:${GENERATE_CONTENT_API}?key=${GEMINI_API_KEY}" -d '@request.json'

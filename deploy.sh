#!/usr/bin/env bash
# رفع المشروع من التيرمينال عبر SSH + rsync
# 1) عدّل المتغيرات أدناه حسب استضافتك
# 2) chmod +x deploy.sh
# 3) ./deploy.sh

set -euo pipefail

REMOTE_USER="اسم_المستخدم_SSH"
REMOTE_HOST="your-server.com"
REMOTE_PATH="public_html"

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

if [[ "$REMOTE_USER" == "اسم_المستخدم_SSH" ]] || [[ "$REMOTE_HOST" == "your-server.com" ]]; then
  echo "عدّل REMOTE_USER و REMOTE_HOST و REMOTE_PATH داخل deploy.sh أولاً."
  exit 1
fi

echo "→ رفع إلى ${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PATH}"

rsync -avz --progress \
  --exclude '.git' \
  --exclude '.DS_Store' \
  --exclude 'deploy.sh' \
  "${SCRIPT_DIR}/" "${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PATH}/"

echo "→ تم. تأكد من db_connect.php وقاعدة البيانات على السيرفر."

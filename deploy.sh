#!/bin/bash

# Deployment script for Tebe Poveryat WordPress theme
# Usage: ./deploy.sh [host] [user] [path]

set -e

# Configuration
THEME_DIR="wp-content/themes/tebe-poveryat"
DEPLOY_HOST="${1:-tebe-poveryat.realeasystudio.site}"
DEPLOY_USER="${2:-abrobe14_monkey}"
DEPLOY_PATH="${3:-/home/a/abrobe14/tebe-poveryat.realeasystudio.site/public_html/wp-content/themes/tebe-poveryat}"

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

echo -e "${YELLOW}========================================${NC}"
echo -e "${YELLOW}Tebe Poveryat Theme Deployment${NC}"
echo -e "${YELLOW}========================================${NC}"
echo -e "Host: ${GREEN}${DEPLOY_USER}@${DEPLOY_HOST}${NC}"
echo -e "Path: ${GREEN}${DEPLOY_PATH}${NC}"
echo ""

# Check if theme directory exists
if [ ! -d "$THEME_DIR" ]; then
    echo -e "${RED}Error: Theme directory not found at $THEME_DIR${NC}"
    exit 1
fi

# Step 1: Build theme
echo -e "${YELLOW}Step 1: Building theme...${NC}"
cd "$THEME_DIR"
npm install
npm run build
cd - > /dev/null
echo -e "${GREEN}✓ Theme built successfully${NC}"
echo ""

# Step 2: Test SSH connection
echo -e "${YELLOW}Step 2: Testing SSH connection...${NC}"
if ssh -o ConnectTimeout=5 "${DEPLOY_USER}@${DEPLOY_HOST}" "echo 'SSH connection OK'"; then
    echo -e "${GREEN}✓ SSH connection OK${NC}"
else
    echo -e "${RED}Error: Cannot connect to server${NC}"
    exit 1
fi
echo ""

# Step 3: Sync files with rsync
echo -e "${YELLOW}Step 3: Uploading files via rsync...${NC}"
rsync -avz --delete \
    --exclude=node_modules \
    --exclude=.git \
    --exclude=src \
    --exclude=package.json \
    --exclude=package-lock.json \
    "$THEME_DIR/" \
    "${DEPLOY_USER}@${DEPLOY_HOST}:${DEPLOY_PATH}/"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✓ Files uploaded successfully${NC}"
else
    echo -e "${RED}Error: rsync failed${NC}"
    exit 1
fi
echo ""

# Step 4: Clear WordPress cache
echo -e "${YELLOW}Step 4: Clearing WordPress cache...${NC}"
ssh "${DEPLOY_USER}@${DEPLOY_HOST}" <<EOF
cd $(dirname $DEPLOY_PATH)
rm -rf wp-content/cache 2>/dev/null || true
rm -rf wp-content/upgrade 2>/dev/null || true
echo "Cache cleared"
EOF

echo -e "${GREEN}✓ Cache cleared${NC}"
echo ""

# Done
echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}✓ Deployment completed successfully!${NC}"
echo -e "${GREEN}========================================${NC}"

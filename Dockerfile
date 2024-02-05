FROM node:lts-alpine as build-stage     # layer unchanged, use cache
WORKDIR /app                            # layer unchanged, use cache
COPY package*.json ./                   # layer changed, run again
RUN npm install                         # previous layer changed, run again
COPY . .                                # previous layer changed, run again
RUN npm run build 
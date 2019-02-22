package config

import (
	"context"
	"github.com/kainonly/iris-bit/facade"
	"github.com/mongodb/mongo-go-driver/bson"
	"testing"
)

func TestLoadInI(t *testing.T) {
	config := Set("./cogs.ini")
	println(config.Mongodb.Uri)
	println(config.Mongodb.Database)
}

func TestMongoDB(t *testing.T) {
	config := new(Config)
	config.Mongodb.Uri = "mongodb://localhost:27017"
	config.Mongodb.Database = "test"
	if err := config.RegisteredMongo(); err != nil {
		t.Error(err)
	}

	if _, err := facade.Db.Collection("admin").InsertOne(
		context.Background(),
		bson.M{"name": "pi", "value": 3.14159},
	); err != nil {
		t.Error(err)
	}
}

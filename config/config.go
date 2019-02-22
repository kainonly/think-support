package config

import (
	"context"
	"github.com/go-ini/ini"
	"github.com/kainonly/iris-bit/facade"
	"github.com/mongodb/mongo-go-driver/mongo"
	"time"
)

type (
	Config struct {
		Mongodb `ini:"mongodb"`
	}

	Mongodb struct {
		Uri      string `ini:"uri"`
		Database string `ini:"database"`
	}
)

var (
	err error
	mgo *mongo.Client
)

func Set(path string) *Config {
	config := new(Config)
	if err = ini.MapTo(config, path); err != nil {
		panic(err.Error())
	}
	return config
}

func (c *Config) RegisteredMongo() error {
	if mgo, err = mongo.NewClient(c.Mongodb.Uri); err != nil {
		return err
	}

	// connect mongodb
	ctx, _ := context.WithTimeout(context.Background(), 5*time.Second)
	if err = mgo.Connect(ctx); err != nil {
		return err
	}

	// using database
	facade.Db = mgo.Database(c.Mongodb.Database)
	return nil
}

package cogs

import (
	"context"
	"github.com/kainonly/iris-bit/facade"
	"github.com/mongodb/mongo-go-driver/mongo"
	"time"
)

type (
	Cogs struct {
		Mongodb mongodb `ini:"mongodb"`
	}

	mongodb struct {
		Hostname string `ini:"hostname"`
		Port     string `ini:"port"`
		Username string `ini:"username"`
		Password string `ini:"password"`
		Database string `ini:"database"`
	}
)

var (
	err error
	mgo *mongo.Client
)

func (c *Cogs) RegisteredMongo() error {
	dsn := "mongodb://" +
		c.Mongodb.Username + ":" +
		c.Mongodb.Password + "@" +
		c.Mongodb.Hostname + ":" +
		c.Mongodb.Port

	if mgo, err = mongo.NewClient(dsn); err != nil {
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
